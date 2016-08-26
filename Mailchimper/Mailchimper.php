<?php

namespace Beelab\MailchimpBundle\Mailchimper;

use Mailchimp\MailchimpCampaigns;
use Mailchimp\MailchimpReports;
use Mailchimp\MailchimpLists;
use Mailchimp\MailchimpTemplates;

class Mailchimper
{
    /**
     * @var MailchimpCampaigns
     */
    private $campaigner;

    /**
     * @var MailchimpReports
     */
    private $reporter;

    /**
     * @var MailchimpLists
     */
    private $lister;

    /**
     * @var MailchimpTemplates
     */
    private $templater;

    /**
     * @param MailchimpCampaigns $campaigner
     */
    public function __construct(
        MailchimpCampaigns $campaigner,
        MailchimpReports $reporter,
        MailchimpLists $lister,
        MailchimpTemplates $templater
    )
    {
        $this->campaigner = $campaigner;
        $this->reporter = $reporter;
        $this->lister = $lister;
        $this->templater = $templater;

    }

    /**
     * @param string $apiKey
     *
     * TODO: Questo si potrebbe migliorare, invece di iniettare le singole classi
     * potrei pensare di iniettarmi solo la classe MailChimp vedi
     */
    public function setApiKey($apiKey){
        $this->campaigner->setApiKey($apiKey);
        $this->reporter->setApiKey($apiKey);
        $this->lister->setApiKey($apiKey);
        $this->templater->setApiKey($apiKey);
    }

    /**
     * @return MailchimpCampaigns
     */
     public function getCampaigner()
     {
        return $this->campaigner;
     }


    /**
     * Create a new campaign
     * 
     * @param string $type 
     * @param array $settings
     * @param array $recipients
     * @param array $parameters
     * @param bool $batch
     *
     * @see http://developer.mailchimp.com/documentation/mailchimp/reference/campaigns/#create-post_campaigns
     */
     public function createCampaign(
        $type, 
        $settings, 
        $recipients, 
        $parameters = [], 
        $batch = FALSE
     )
     {
        return $this->campaigner->addCampaign($type, (object)$recipients, (object)$settings, $parameters, $batch);
     }

    /**
     * get a campaign
     * 
     * @param string $id mailchimp Campaing id
     * @param array $parameters
     *
     * @see http://developer.mailchimp.com/documentation/mailchimp/reference/campaigns/#read-get_campaigns_campaign_id
     */
     public function getCampaign($id, $parameters = [])
     {
        return $this->campaigner->getCampaign($id, $parameters);
     }

    /**
     * set campaign content
     * 
     * @param string $id mailchimp Campaing id
     * @param array $parameters
     *
     * @see http://developer.mailchimp.com/documentation/mailchimp/reference/campaigns/content/#edit-put_campaigns_campaign_id_content
     */
     public function setCampaignContent($id, $parameters = [])
     {
        return $this->campaigner->setCampaignContent($id, $parameters);
     }

    /**
     * send test message
     * 
     * @param string $id mailchimp Campaing id
     * @param array $test_email
     * @param string $send_type 
     * @param array $parameters
     * @param boolean $batch
     *
     * @see http://developer.mailchimp.com/documentation/mailchimp/reference/campaigns/#action-post_campaigns_campaign_id_actions_test
     */
     public function sendTest($id, $test_email, $sent_type = "html", $parameters = [], $batch = false)
     {
        return $this->campaigner->sendTest($id, $test_email, $sent_type, $parameters, $batch);
     }

    /**
     * send  message to specific list
     * 
     * @param string $id mailchimp Campaing id
     * @param boolean $batch
     *
     * @see http://developer.mailchimp.com/documentation/mailchimp/reference/campaigns/#action-post_campaigns_campaign_id_actions_send
     */
     public function send($id, $batch = false)
     {
         return $this->campaigner->send($id, $batch);
     }

    /**
     * @param $id
     * @return object
     */
     public function stats($id)
     {
        return $this->reporter->getCampaignSummary($id);
     }

}
