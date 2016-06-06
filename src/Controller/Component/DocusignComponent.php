<?php

namespace App\Controller\Component;

use App\Model\Entity\HomeOwner;

use Cake\Controller\Component;
use Cake\Core\Configure;

use DocuSign\eSign\ApiClient;
use DocuSign\eSign\ApiException;
use DocuSign\eSign\Api\AuthenticationApi;
use DocuSign\eSign\Api\AuthenticationApi\LoginOptions;
use DocuSign\eSign\Api\EnvelopesApi;
use DocuSign\eSign\Api\EnvelopesApi\CreateEnvelopeOptions;
use DocuSign\eSign\Configuration;
use DocuSign\eSign\Model\EnvelopeDefinition;
use DocuSign\eSign\Model\RecipientViewRequest;
use DocuSign\eSign\Model\TemplateRole;

class DocuSignComponent extends Component
{

    private $_accountID;
    private $_apiClient;
    private $_apiUrl = 'https://demo.docusign.net/restapi/';

    /**
     * @return void
     */
    public function initialize(array $config)
    {
        $config = new Configuration();
        $config->setHost($this->_apiUrl);
        $config->addDefaultHeader(
            "X-DocuSign-Authentication",
            "{
                \"Username\":\"" . Configure::read('HackForGood.DocuSign.username') . "\",
                \"Password\":\"" . Configure::read('HackForGood.DocuSign.password') . "\",
                \"IntegratorKey\":\"" . Configure::read('HackForGood.DocuSign.integratorKey') . "\"
            }"
        );

        $this->_apiClient = new ApiClient($config);
    }

    /**
     * @return int
     */
    private function _accountID()
    {
        if ($this->_accountID) {
            return $this->_accountID;
        }

        $authenticationApi = new AuthenticationApi($this->_apiClient);
        $loginInformation = $authenticationApi->login(new LoginOptions());

        if (count($loginInformation) > 0) {
            $this->_accountID = $loginInformation->getLoginAccounts()[0]->getAccountId();
        }

        return $this->_accountID;
    }

    /**
     * @return bool|string
     */
    public function signingUrl(HomeOwner $homeOwner)
    {
        try {
            $accountId = $this->_accountID();

            if ($accountId) {
                $templateRole = new TemplateRole();

                $templateRole->setClientUserId($homeOwner->id);
                $templateRole->setEmail($homeOwner->email);
                $templateRole->setName($homeOwner->name);
                $templateRole->setRoleName('homeowner');

                $envelopDefinition = new EnvelopeDefinition();

                $envelopDefinition->setEmailSubject("[DocuSign PHP SDK] - Please sign this template doc");
                $envelopDefinition->setTemplateRoles([$templateRole]);
                $envelopDefinition->setTemplateId(Configure::read('HackForGood.DocuSign.templateId'));
                $envelopDefinition->setStatus('sent');

                $options = new CreateEnvelopeOptions();

                $options->setCdseMode(null);
                $options->setMergeRolesOnDraft(null);

                $envelopeApi = new EnvelopesApi($this->_apiClient);

                $envelopeSummary = $envelopeApi->createEnvelope($this->_accountID(), $envelopDefinition, $options);

                if ($envelopeSummary) {
                    $recipientViewRequest = new RecipientViewRequest();
                    
                    $recipientViewRequest->setReturnUrl('/');
                    $recipientViewRequest->setClientUserId($homeOwner->id);
                    $recipientViewRequest->setAuthenticationMethod('email');
                    $recipientViewRequest->setUserName($homeOwner->name);
                    $recipientViewRequest->setEmail($homeOwner->email);

                    $signingView = $envelopeApi->createRecipientView($accountId, $envelopeSummary->getEnvelopeId(), $recipientViewRequest);

                    $url = $signingView->getUrl();
                }
            }
        } catch (ApiException $e) {
            $url = false;
        }

        return $url;
    }
}
