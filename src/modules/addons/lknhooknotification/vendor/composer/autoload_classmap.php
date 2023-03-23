<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(__DIR__);
$baseDir = dirname($vendorDir);

return array(
    'Cake\\Core\\App' => $vendorDir . '/cakephp/core/App.php',
    'Cake\\Core\\BasePlugin' => $vendorDir . '/cakephp/core/BasePlugin.php',
    'Cake\\Core\\ClassLoader' => $vendorDir . '/cakephp/core/ClassLoader.php',
    'Cake\\Core\\Configure' => $vendorDir . '/cakephp/core/Configure.php',
    'Cake\\Core\\Configure\\ConfigEngineInterface' => $vendorDir . '/cakephp/core/Configure/ConfigEngineInterface.php',
    'Cake\\Core\\Configure\\Engine\\IniConfig' => $vendorDir . '/cakephp/core/Configure/Engine/IniConfig.php',
    'Cake\\Core\\Configure\\Engine\\JsonConfig' => $vendorDir . '/cakephp/core/Configure/Engine/JsonConfig.php',
    'Cake\\Core\\Configure\\Engine\\PhpConfig' => $vendorDir . '/cakephp/core/Configure/Engine/PhpConfig.php',
    'Cake\\Core\\Configure\\FileConfigTrait' => $vendorDir . '/cakephp/core/Configure/FileConfigTrait.php',
    'Cake\\Core\\ConsoleApplicationInterface' => $vendorDir . '/cakephp/core/ConsoleApplicationInterface.php',
    'Cake\\Core\\Container' => $vendorDir . '/cakephp/core/Container.php',
    'Cake\\Core\\ContainerApplicationInterface' => $vendorDir . '/cakephp/core/ContainerApplicationInterface.php',
    'Cake\\Core\\ContainerInterface' => $vendorDir . '/cakephp/core/ContainerInterface.php',
    'Cake\\Core\\ConventionsTrait' => $vendorDir . '/cakephp/core/ConventionsTrait.php',
    'Cake\\Core\\Exception\\CakeException' => $vendorDir . '/cakephp/core/Exception/CakeException.php',
    'Cake\\Core\\Exception\\MissingPluginException' => $vendorDir . '/cakephp/core/Exception/MissingPluginException.php',
    'Cake\\Core\\HttpApplicationInterface' => $vendorDir . '/cakephp/core/HttpApplicationInterface.php',
    'Cake\\Core\\InstanceConfigTrait' => $vendorDir . '/cakephp/core/InstanceConfigTrait.php',
    'Cake\\Core\\ObjectRegistry' => $vendorDir . '/cakephp/core/ObjectRegistry.php',
    'Cake\\Core\\Plugin' => $vendorDir . '/cakephp/core/Plugin.php',
    'Cake\\Core\\PluginApplicationInterface' => $vendorDir . '/cakephp/core/PluginApplicationInterface.php',
    'Cake\\Core\\PluginCollection' => $vendorDir . '/cakephp/core/PluginCollection.php',
    'Cake\\Core\\PluginInterface' => $vendorDir . '/cakephp/core/PluginInterface.php',
    'Cake\\Core\\Retry\\CommandRetry' => $vendorDir . '/cakephp/core/Retry/CommandRetry.php',
    'Cake\\Core\\Retry\\RetryStrategyInterface' => $vendorDir . '/cakephp/core/Retry/RetryStrategyInterface.php',
    'Cake\\Core\\ServiceConfig' => $vendorDir . '/cakephp/core/ServiceConfig.php',
    'Cake\\Core\\ServiceProvider' => $vendorDir . '/cakephp/core/ServiceProvider.php',
    'Cake\\Core\\StaticConfigTrait' => $vendorDir . '/cakephp/core/StaticConfigTrait.php',
    'Cake\\Core\\TestSuite\\ContainerStubTrait' => $vendorDir . '/cakephp/core/TestSuite/ContainerStubTrait.php',
    'Cake\\Utility\\CookieCryptTrait' => $vendorDir . '/cakephp/utility/CookieCryptTrait.php',
    'Cake\\Utility\\Crypto\\OpenSsl' => $vendorDir . '/cakephp/utility/Crypto/OpenSsl.php',
    'Cake\\Utility\\Exception\\XmlException' => $vendorDir . '/cakephp/utility/Exception/XmlException.php',
    'Cake\\Utility\\Hash' => $vendorDir . '/cakephp/utility/Hash.php',
    'Cake\\Utility\\Inflector' => $vendorDir . '/cakephp/utility/Inflector.php',
    'Cake\\Utility\\MergeVariablesTrait' => $vendorDir . '/cakephp/utility/MergeVariablesTrait.php',
    'Cake\\Utility\\Security' => $vendorDir . '/cakephp/utility/Security.php',
    'Cake\\Utility\\Text' => $vendorDir . '/cakephp/utility/Text.php',
    'Cake\\Utility\\Xml' => $vendorDir . '/cakephp/utility/Xml.php',
    'Cake\\Validation\\RulesProvider' => $vendorDir . '/cakephp/validation/RulesProvider.php',
    'Cake\\Validation\\ValidatableInterface' => $vendorDir . '/cakephp/validation/ValidatableInterface.php',
    'Cake\\Validation\\Validation' => $vendorDir . '/cakephp/validation/Validation.php',
    'Cake\\Validation\\ValidationRule' => $vendorDir . '/cakephp/validation/ValidationRule.php',
    'Cake\\Validation\\ValidationSet' => $vendorDir . '/cakephp/validation/ValidationSet.php',
    'Cake\\Validation\\Validator' => $vendorDir . '/cakephp/validation/Validator.php',
    'Cake\\Validation\\ValidatorAwareInterface' => $vendorDir . '/cakephp/validation/ValidatorAwareInterface.php',
    'Cake\\Validation\\ValidatorAwareTrait' => $vendorDir . '/cakephp/validation/ValidatorAwareTrait.php',
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'Lkn\\HookNotification\\Config\\ChatwootChannels' => $baseDir . '/src/Config/ChatwootChannels.php',
    'Lkn\\HookNotification\\Config\\Hooks' => $baseDir . '/src/Config/Hooks.php',
    'Lkn\\HookNotification\\Config\\Platforms' => $baseDir . '/src/Config/Platforms.php',
    'Lkn\\HookNotification\\Config\\Settings' => $baseDir . '/src/Config/Settings.php',
    'Lkn\\HookNotification\\Custom\\HooksData\\Factories\\OrderFactory' => $baseDir . '/src/Custom/HooksData/Factories/OrderFactory.php',
    'Lkn\\HookNotification\\Custom\\HooksData\\Order' => $baseDir . '/src/Custom/HooksData/Order.php',
    'Lkn\\HookNotification\\Database\\DatabaseUpgrade' => $baseDir . '/src/Database/DatabaseUpgrade.php',
    'Lkn\\HookNotification\\Database\\Entities\\ConfigsEntity' => $baseDir . '/src/Database/Entities/ConfigsEntity.php',
    'Lkn\\HookNotification\\Dispatcher' => $baseDir . '/src/Dispatcher.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Abstracts\\BaseController' => $baseDir . '/src/Domains/Admin/Abstracts/BaseController.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Abstracts\\BaseRepository' => $baseDir . '/src/Domains/Admin/Abstracts/BaseRepository.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Abstracts\\BaseRequestFactory' => $baseDir . '/src/Domains/Admin/Abstracts/BaseRequestFactory.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Factories\\Requests\\Chatwoot\\UpdateIndexFactory' => $baseDir . '/src/Domains/Admin/Factories/Requests/Chatwoot/UpdateIndexFactory.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Factories\\Requests\\UpdateModuleIndexFactory' => $baseDir . '/src/Domains/Admin/Factories/Requests/UpdateModuleIndexFactory.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Factories\\Requests\\WhatsApp\\StoreAssocRequestFactory' => $baseDir . '/src/Domains/Admin/Factories/Requests/WhatsApp/StoreAssocRequestFactory.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Factories\\Requests\\WhatsApp\\UpdateAssocRequestFactory' => $baseDir . '/src/Domains/Admin/Factories/Requests/WhatsApp/UpdateAssocRequestFactory.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Factories\\Requests\\WhatsApp\\UpdateIndexFactory' => $baseDir . '/src/Domains/Admin/Factories/Requests/WhatsApp/UpdateIndexFactory.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Hooks\\AdminInvoicesControlsOutput' => $baseDir . '/src/Domains/Admin/Hooks/AdminInvoicesControlsOutput.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Http\\Controllers\\AdminController' => $baseDir . '/src/Domains/Admin/Http/Controllers/AdminController.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Http\\Controllers\\ChatwootController' => $baseDir . '/src/Domains/Admin/Http/Controllers/ChatwootController.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Http\\Controllers\\WhatsAppAssocController' => $baseDir . '/src/Domains/Admin/Http/Controllers/WhatsAppAssocController.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Http\\Controllers\\WhatsAppController' => $baseDir . '/src/Domains/Admin/Http/Controllers/WhatsAppController.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Http\\Requests\\Chatwoot\\UpdateIndexRequest' => $baseDir . '/src/Domains/Admin/Http/Requests/Chatwoot/UpdateIndexRequest.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Http\\Requests\\UpdateModuleIndexRequest' => $baseDir . '/src/Domains/Admin/Http/Requests/UpdateModuleIndexRequest.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Http\\Requests\\WhatsApp\\StoreAssocRequest' => $baseDir . '/src/Domains/Admin/Http/Requests/WhatsApp/StoreAssocRequest.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Http\\Requests\\WhatsApp\\UpdateAssocRequest' => $baseDir . '/src/Domains/Admin/Http/Requests/WhatsApp/UpdateAssocRequest.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Http\\Requests\\WhatsApp\\UpdateIndexRequest' => $baseDir . '/src/Domains/Admin/Http/Requests/WhatsApp/UpdateIndexRequest.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Repositories\\ChatwootRepository' => $baseDir . '/src/Domains/Admin/Repositories/ChatwootRepository.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Repositories\\ModuleRepository' => $baseDir . '/src/Domains/Admin/Repositories/ModuleRepository.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Repositories\\WhatsAppApiRepository' => $baseDir . '/src/Domains/Admin/Repositories/WhatsAppApiRepository.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Repositories\\WhatsAppAssocRepository' => $baseDir . '/src/Domains/Admin/Repositories/WhatsAppAssocRepository.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Repositories\\WhatsAppRepository' => $baseDir . '/src/Domains/Admin/Repositories/WhatsAppRepository.php',
    'Lkn\\HookNotification\\Domains\\Admin\\Router' => $baseDir . '/src/Domains/Admin/Router.php',
    'Lkn\\HookNotification\\Domains\\Platform\\Abstracts\\HookDataParser' => $baseDir . '/src/Domains/Platform/Abstracts/HookDataParser.php',
    'Lkn\\HookNotification\\Domains\\Platform\\HooksData\\Factories\\InvoiceReminderFactory' => $baseDir . '/src/Domains/Platform/HooksData/Factories/InvoiceReminderFactory.php',
    'Lkn\\HookNotification\\Domains\\Platform\\HooksData\\Factories\\OrderCreatedFactory' => $baseDir . '/src/Domains/Platform/HooksData/Factories/OrderCreatedFactory.php',
    'Lkn\\HookNotification\\Domains\\Platform\\HooksData\\Invoice' => $baseDir . '/src/Domains/Platform/HooksData/Invoice.php',
    'Lkn\\HookNotification\\Domains\\Platform\\HooksData\\Order' => $baseDir . '/src/Domains/Platform/HooksData/Order.php',
    'Lkn\\HookNotification\\Domains\\Platform\\Interfaces\\PlatformHookFileInterface' => $baseDir . '/src/Domains/Platform/Interfaces/PlatformHookFileInterface.php',
    'Lkn\\HookNotification\\Domains\\Platform\\Traits\\HookDataGetter' => $baseDir . '/src/Domains/Platform/Traits/HookDataGetter.php',
    'Lkn\\HookNotification\\Domains\\Platforms\\Chatwoot\\Abstracts\\ChatwootApi' => $baseDir . '/src/Domains/Platforms/Chatwoot/Abstracts/ChatwootApi.php',
    'Lkn\\HookNotification\\Domains\\Platforms\\Chatwoot\\Abstracts\\ChatwootHookFile' => $baseDir . '/src/Domains/Platforms/Chatwoot/Abstracts/ChatwootHookFile.php',
    'Lkn\\HookNotification\\Domains\\Platforms\\WhatsApp\\Abstracts\\MessageTamplateParser' => $baseDir . '/src/Domains/Platforms/WhatsApp/Abstracts/MessageTamplateParser.php',
    'Lkn\\HookNotification\\Domains\\Platforms\\WhatsApp\\Abstracts\\WhatsappHookFile' => $baseDir . '/src/Domains/Platforms/WhatsApp/Abstracts/WhatsappHookFile.php',
    'Lkn\\HookNotification\\Domains\\Platforms\\WhatsApp\\Events\\ChatwootSendMessageAsPrivate' => $baseDir . '/src/Domains/Platforms/WhatsApp/Events/ChatwootSendMessageAsPrivate.php',
    'Lkn\\HookNotification\\Domains\\Platforms\\WhatsApp\\Hooks\\InvoiceReminder' => $baseDir . '/src/Domains/Platforms/WhatsApp/Hooks/InvoiceReminder.php',
    'Lkn\\HookNotification\\Domains\\Platforms\\WhatsApp\\Hooks\\InvoiceReminderPdf' => $baseDir . '/src/Domains/Platforms/WhatsApp/Hooks/InvoiceReminderPdf.php',
    'Lkn\\HookNotification\\Domains\\Platforms\\WhatsApp\\Hooks\\OrderCreated' => $baseDir . '/src/Domains/Platforms/WhatsApp/Hooks/OrderCreated.php',
    'Lkn\\HookNotification\\Domains\\Platforms\\WhatsApp\\Interfaces\\WhatsappHookFileInterface' => $baseDir . '/src/Domains/Platforms/WhatsApp/Interfaces/WhatsappHookFileInterface.php',
    'Lkn\\HookNotification\\Helpers\\Config' => $baseDir . '/src/Helpers/Config.php',
    'Lkn\\HookNotification\\Helpers\\Formatter' => $baseDir . '/src/Helpers/Formatter.php',
    'Lkn\\HookNotification\\Helpers\\License' => $baseDir . '/src/Helpers/License.php',
    'Lkn\\HookNotification\\Helpers\\Link' => $baseDir . '/src/Helpers/Link.php',
    'Lkn\\HookNotification\\Helpers\\Log' => $baseDir . '/src/Helpers/Log.php',
    'Lkn\\HookNotification\\Helpers\\Response' => $baseDir . '/src/Helpers/Response.php',
    'Lkn\\HookNotification\\Helpers\\VersionUpgrade' => $baseDir . '/src/Helpers/VersionUpgrade.php',
    'Lkn\\HookNotification\\Helpers\\View' => $baseDir . '/src/Helpers/View.php',
    'Lkn\\HookNotification\\Policies\\DoesExceedMaxHooksOnFreePlanPolicy' => $baseDir . '/src/Policies/DoesExceedMaxHooksOnFreePlanPolicy.php',
    'Lkn\\HookNotification\\Policies\\ReachedMaxMsgTemplateAssocs' => $baseDir . '/src/Policies/ReachedMaxMsgTemplateAssocs.php',
    'Psr\\Http\\Message\\MessageInterface' => $vendorDir . '/psr/http-message/src/MessageInterface.php',
    'Psr\\Http\\Message\\RequestInterface' => $vendorDir . '/psr/http-message/src/RequestInterface.php',
    'Psr\\Http\\Message\\ResponseInterface' => $vendorDir . '/psr/http-message/src/ResponseInterface.php',
    'Psr\\Http\\Message\\ServerRequestInterface' => $vendorDir . '/psr/http-message/src/ServerRequestInterface.php',
    'Psr\\Http\\Message\\StreamInterface' => $vendorDir . '/psr/http-message/src/StreamInterface.php',
    'Psr\\Http\\Message\\UploadedFileInterface' => $vendorDir . '/psr/http-message/src/UploadedFileInterface.php',
    'Psr\\Http\\Message\\UriInterface' => $vendorDir . '/psr/http-message/src/UriInterface.php',
);
