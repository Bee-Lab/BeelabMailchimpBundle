<?php

namespace Beelab\MailchimpBundle\Util;

class MailchimpCampaignSettings
{
    /**
     * @var MailchimpCampaigns
     */
    private $campaigner;


    /**
     * @param MailchimpCampaigns $campaigner
     */
    public function __construct(
        array $settingsMailchimpCampaigns $campaigner
    )
    {
        $this->campaigner = $campaigner;
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
        $recipients = null, 
        $parameters = [], 
        $batch = FALSE
    )
     {
    
        $settings = new MailchimpCampaignSettings($settings);
        $campaign = $this->campaigner->addCampaign($type, $recipients, $settings, $parameters, $batch);
     }

}
