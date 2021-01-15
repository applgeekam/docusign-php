<?php

namespace Example\Controllers;

use Example\Services\RouterService;
abstract class BaseController
{
    /**
     * Path for the directory with demo documents
     */
    public const DEMO_DOCS_PATH = __DIR__ . '/../../public/demo_documents/';
    public const DOCS_PATH = __DIR__ . '/../../public/uploads/';

    # DCM-3905 The SDK helper method for setting the SigningUIVersion is temporarily unavailable at this time.
    # As a temporary workaround, a raw JSON settings object is passed to sdk methods that use a permission profile.

    # Default settings for updating and creating permissions
    private const SETTINGS = [
        "useNewDocuSignExperienceInterface"=> "optional",
        "allowBulkSending"=> "true",
        "allowEnvelopeSending"=> "true",
        "allowSignerAttachments"=> "true",
        "allowTaggingInSendAndCorrect"=> "true",
        "allowWetSigningOverride"=> "true",
        "allowedAddressBookAccess"=> "personalAndShared",
        "allowedTemplateAccess"=> "share",
        "enableRecipientViewingNotifications"=> "true",
        "enableSequentialSigningInterface"=> "true",
        "receiveCompletedSelfSignedDocumentsAsEmailLinks"=> "false",
        "signingUiVersion"=> "v2",
        "useNewSendingInterface"=> "true",
        "allowApiAccess"=> "true",
        "allowApiAccessToAccount"=> "true",
        "allowApiSendingOnBehalfOfOthers"=> "true",
        "allowApiSequentialSigning"=> "true",
        "enableApiRequestLogging"=> "true",
        "allowDocuSignDesktopClient"=> "false",
        "allowSendersToSetRecipientEmailLanguage"=> "true",
        "allowVaulting"=> "false",
        "allowedToBeEnvelopeTransferRecipient"=> "true",
        "enableTransactionPointIntegration"=> "false",
        "powerFormRole"=> "admin",
        "vaultingMode"=> "none"
    ];

    /**
     * Base controller
     *
     * @param $eg string
     * @param $routerService RouterService
     * @param $basename string|null
     * @param $brand_languages array|null
     * @param $brands array|null
     * @param $permission_profiles array|null
     * @return void
     */
    public function controller(
        string $eg,
        $routerService,
        $basename = null,
        $brand_languages = null,
        $brands = null,
        $permission_profiles = null,
        $groups = null
    ): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'GET') {
            $this->getController($eg, $routerService);
        };
        if ($method == 'POST') {
            $routerService->check_csrf();
            $this->createController();
        };
    }

    /**
     * Show the example's form page
     *
     * @param $eg string
     * @param $routerService RouterService
     * @return void
     */
    private function getController(
        string $eg,
        $routerService
    ): void
    {
        if ($routerService->ds_token_ok()) {

            header('Location: ' . $GLOBALS['app_url'] . 'index.php?page=dashboard');
            exit;

        } else {
            # Save the current operation so it will be resumed after authentication
            $_SESSION['eg'] = $GLOBALS['app_url'] . 'index.php?page=' . $eg;
            header('Location: ' . $GLOBALS['app_url'] . 'index.php?page=must_authenticate');
            exit;
        }
    }

    /**
     * Get static Profile settings
     */
    public function getSettings()
    {
        return self::SETTINGS;
    }

    /**
     * Declaration for the base controller creator. Each creator should be described in specific Controller
     */
    abstract function createController();
}
