<?php
/*
 * Copyright 2017, Google LLC All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/firestore/v1beta1/firestore.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * EXPERIMENTAL: this client library class has not yet been declared GA (1.0). This means that
 * even though we intent the surface to be stable, we may make backwards incompatible changes
 * if necessary.
 *
 * @experimental
 */

namespace Google\Cloud\Firestore\V1beta1\Gapic;

use Google\ApiCore\Call;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\Transport\ApiTransportInterface;
use Google\ApiCore\ValidationException;
use Google\Cloud\Firestore\V1beta1\BatchGetDocumentsRequest;
use Google\Cloud\Firestore\V1beta1\BatchGetDocumentsResponse;
use Google\Cloud\Firestore\V1beta1\BeginTransactionRequest;
use Google\Cloud\Firestore\V1beta1\BeginTransactionResponse;
use Google\Cloud\Firestore\V1beta1\CommitRequest;
use Google\Cloud\Firestore\V1beta1\CommitResponse;
use Google\Cloud\Firestore\V1beta1\CreateDocumentRequest;
use Google\Cloud\Firestore\V1beta1\DeleteDocumentRequest;
use Google\Cloud\Firestore\V1beta1\Document;
use Google\Cloud\Firestore\V1beta1\DocumentMask;
use Google\Cloud\Firestore\V1beta1\GetDocumentRequest;
use Google\Cloud\Firestore\V1beta1\ListCollectionIdsRequest;
use Google\Cloud\Firestore\V1beta1\ListCollectionIdsResponse;
use Google\Cloud\Firestore\V1beta1\ListDocumentsRequest;
use Google\Cloud\Firestore\V1beta1\ListDocumentsResponse;
use Google\Cloud\Firestore\V1beta1\ListenRequest;
use Google\Cloud\Firestore\V1beta1\ListenResponse;
use Google\Cloud\Firestore\V1beta1\Precondition;
use Google\Cloud\Firestore\V1beta1\RollbackRequest;
use Google\Cloud\Firestore\V1beta1\RunQueryRequest;
use Google\Cloud\Firestore\V1beta1\RunQueryResponse;
use Google\Cloud\Firestore\V1beta1\StructuredQuery;
use Google\Cloud\Firestore\V1beta1\Target;
use Google\Cloud\Firestore\V1beta1\TransactionOptions;
use Google\Cloud\Firestore\V1beta1\UpdateDocumentRequest;
use Google\Cloud\Firestore\V1beta1\Write;
use Google\Cloud\Firestore\V1beta1\WriteRequest;
use Google\Cloud\Firestore\V1beta1\WriteResponse;
use Google\Protobuf\GPBEmpty;
use Google\Protobuf\Timestamp;

/**
 * Service Description: The Cloud Firestore service.
 *
 * This service exposes several types of comparable timestamps:
 *
 * *    `create_time` - The time at which a document was created. Changes only
 *      when a document is deleted, then re-created. Increases in a strict
 *       monotonic fashion.
 * *    `update_time` - The time at which a document was last updated. Changes
 *      every time a document is modified. Does not change when a write results
 *      in no modifications. Increases in a strict monotonic fashion.
 * *    `read_time` - The time at which a particular state was observed. Used
 *      to denote a consistent snapshot of the database or the time at which a
 *      Document was observed to not exist.
 * *    `commit_time` - The time at which the writes in a transaction were
 *      committed. Any read with an equal or greater `read_time` is guaranteed
 *      to see the effects of the transaction.
 *
 * EXPERIMENTAL: this client library class has not yet been declared GA (1.0). This means that
 * even though we intent the surface to be stable, we may make backwards incompatible changes
 * if necessary.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * try {
 *     $firestoreClient = new FirestoreClient();
 *     $formattedName = $firestoreClient->anyPathName('[PROJECT]', '[DATABASE]', '[DOCUMENT]', '[ANY_PATH]');
 *     $response = $firestoreClient->getDocument($formattedName);
 * } finally {
 *     $firestoreClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To assist
 * with these names, this class includes a format method for each type of name, and additionally
 * a parseName method to extract the individual identifiers contained within formatted names
 * that are returned by the API.
 *
 * @experimental
 */
class FirestoreGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.firestore.v1beta1.Firestore';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'firestore.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The code generator version, to be included in the agent header.
     */
    const CODEGEN_VERSION = '0.0.5';

    private static $databaseRootNameTemplate;
    private static $documentRootNameTemplate;
    private static $documentPathNameTemplate;
    private static $anyPathNameTemplate;
    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS,
            'port' => self::DEFAULT_SERVICE_PORT,
            'scopes' => [
                'https://www.googleapis.com/auth/cloud-platform',
                'https://www.googleapis.com/auth/datastore',
            ],
            'clientConfigPath' => __DIR__.'/../resources/firestore_client_config.json',
            'restClientConfigPath' => __DIR__.'/../resources/firestore_rest_client_config.php',
            'descriptorsConfigPath' => __DIR__.'/../resources/firestore_descriptor_config.php',
        ];
    }

    private static function getDatabaseRootNameTemplate()
    {
        if (null == self::$databaseRootNameTemplate) {
            self::$databaseRootNameTemplate = new PathTemplate('projects/{project}/databases/{database}');
        }

        return self::$databaseRootNameTemplate;
    }

    private static function getDocumentRootNameTemplate()
    {
        if (null == self::$documentRootNameTemplate) {
            self::$documentRootNameTemplate = new PathTemplate('projects/{project}/databases/{database}/documents');
        }

        return self::$documentRootNameTemplate;
    }

    private static function getDocumentPathNameTemplate()
    {
        if (null == self::$documentPathNameTemplate) {
            self::$documentPathNameTemplate = new PathTemplate('projects/{project}/databases/{database}/documents/{document_path=**}');
        }

        return self::$documentPathNameTemplate;
    }

    private static function getAnyPathNameTemplate()
    {
        if (null == self::$anyPathNameTemplate) {
            self::$anyPathNameTemplate = new PathTemplate('projects/{project}/databases/{database}/documents/{document}/{any_path=**}');
        }

        return self::$anyPathNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'databaseRoot' => self::getDatabaseRootNameTemplate(),
                'documentRoot' => self::getDocumentRootNameTemplate(),
                'documentPath' => self::getDocumentPathNameTemplate(),
                'anyPath' => self::getAnyPathNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a database_root resource.
     *
     * @param string $project
     * @param string $database
     *
     * @return string The formatted database_root resource.
     * @experimental
     */
    public static function databaseRootName($project, $database)
    {
        return self::getDatabaseRootNameTemplate()->render([
            'project' => $project,
            'database' => $database,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a document_root resource.
     *
     * @param string $project
     * @param string $database
     *
     * @return string The formatted document_root resource.
     * @experimental
     */
    public static function documentRootName($project, $database)
    {
        return self::getDocumentRootNameTemplate()->render([
            'project' => $project,
            'database' => $database,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a document_path resource.
     *
     * @param string $project
     * @param string $database
     * @param string $documentPath
     *
     * @return string The formatted document_path resource.
     * @experimental
     */
    public static function documentPathName($project, $database, $documentPath)
    {
        return self::getDocumentPathNameTemplate()->render([
            'project' => $project,
            'database' => $database,
            'document_path' => $documentPath,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a any_path resource.
     *
     * @param string $project
     * @param string $database
     * @param string $document
     * @param string $anyPath
     *
     * @return string The formatted any_path resource.
     * @experimental
     */
    public static function anyPathName($project, $database, $document, $anyPath)
    {
        return self::getAnyPathNameTemplate()->render([
            'project' => $project,
            'database' => $database,
            'document' => $document,
            'any_path' => $anyPath,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - databaseRoot: projects/{project}/databases/{database}
     * - documentRoot: projects/{project}/databases/{database}/documents
     * - documentPath: projects/{project}/databases/{database}/documents/{document_path=**}
     * - anyPath: projects/{project}/databases/{database}/documents/{document}/{any_path=**}.
     *
     * The optional $template argument can be supplied to specify a particular pattern, and must
     * match one of the templates listed above. If no $template argument is provided, or if the
     * $template argument does not match one of the templates listed, then parseName will check
     * each of the supported templates, and return the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();

        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }
        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress The domain name of the API remote host.
     *                                  Default 'firestore.googleapis.com'.
     *     @type mixed $port The port on which to connect to the remote host. Default 443.
     *     @type \Grpc\Channel $channel
     *           A `Channel` object. If not specified, a channel will be constructed.
     *           NOTE: This option is only valid when utilizing the gRPC transport.
     *     @type \Grpc\ChannelCredentials $sslCreds
     *           A `ChannelCredentials` object for use with an SSL-enabled channel.
     *           Default: a credentials object returned from
     *           \Grpc\ChannelCredentials::createSsl().
     *           NOTE: This option is only valid when utilizing the gRPC transport. Also, if the $channel
     *           optional argument is specified, then this argument is unused.
     *     @type bool $forceNewChannel
     *           If true, this forces gRPC to create a new channel instead of using a persistent channel.
     *           Defaults to false.
     *           NOTE: This option is only valid when utilizing the gRPC transport. Also, if the $channel
     *           optional argument is specified, then this option is unused.
     *     @type \Google\Auth\CredentialsLoader $credentialsLoader
     *           A CredentialsLoader object created using the Google\Auth library.
     *     @type array $scopes A string array of scopes to use when acquiring credentials.
     *                          Defaults to the scopes for the Google Cloud Firestore API.
     *     @type string $clientConfigPath
     *           Path to a JSON file containing client method configuration, including retry settings.
     *           Specify this setting to specify the retry behavior of all methods on the client.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder. The retry settings provided in this option can be overridden
     *           by settings in $retryingOverride
     *     @type array $retryingOverride
     *           An associative array in which the keys are method names (e.g. 'createFoo'), and
     *           the values are retry settings to use for that method. The retry settings for each
     *           method can be a {@see Google\ApiCore\RetrySettings} object, or an associative array
     *           of retry settings parameters. See the documentation on {@see Google\ApiCore\RetrySettings}
     *           for example usage. Passing a value of null is equivalent to a value of
     *           ['retriesEnabled' => false]. Retry settings provided in this setting override the
     *           settings in $clientConfigPath.
     *     @type callable $authHttpHandler A handler used to deliver PSR-7 requests specifically
     *           for authentication. Should match a signature of
     *           `function (RequestInterface $request, array $options) : ResponseInterface`
     *           NOTE: This option is only valid when utilizing the REST transport.
     *     @type callable $httpHandler A handler used to deliver PSR-7 requests. Should match a
     *           signature of `function (RequestInterface $request, array $options) : PromiseInterface`
     *           NOTE: This option is only valid when utilizing the REST transport.
     *     @type string|ApiTransportInterface $transport The transport used for executing network
     *           requests. May be either the string `rest` or `grpc`. Additionally, it is possible
     *           to pass in an already instantiated transport. Defaults to `grpc` if gRPC support is
     *           detected on the system.
     * }
     * @experimental
     */
    public function __construct($options = [])
    {
        $this->setClientOptions($options + self::getClientDefaults());
    }

    /**
     * Gets a single document.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedName = $firestoreClient->anyPathName('[PROJECT]', '[DATABASE]', '[DOCUMENT]', '[ANY_PATH]');
     *     $response = $firestoreClient->getDocument($formattedName);
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param string $name         The resource name of the Document to get. In the format:
     *                             `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type DocumentMask $mask
     *          The fields to return. If not set, returns all fields.
     *
     *          If the document has a field that is not present in this mask, that field
     *          will not be returned in the response.
     *     @type string $transaction
     *          Reads the document in a transaction.
     *     @type Timestamp $readTime
     *          Reads the version of the document at the given time.
     *          This may not be older than 60 seconds.
     *     @type \Google\ApiCore\RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Firestore\V1beta1\Document
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function getDocument($name, $optionalArgs = [])
    {
        $request = new GetDocumentRequest();
        $request->setName($name);
        if (isset($optionalArgs['mask'])) {
            $request->setMask($optionalArgs['mask']);
        }
        if (isset($optionalArgs['transaction'])) {
            $request->setTransaction($optionalArgs['transaction']);
        }
        if (isset($optionalArgs['readTime'])) {
            $request->setReadTime($optionalArgs['readTime']);
        }

        return $this->startCall(
            new Call(
                self::SERVICE_NAME.'/GetDocument',
                Document::class,
                $request
            ),
            $this->configureCallSettings('getDocument', $optionalArgs)
        )->wait();
    }

    /**
     * Lists documents.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedParent = $firestoreClient->anyPathName('[PROJECT]', '[DATABASE]', '[DOCUMENT]', '[ANY_PATH]');
     *     $collectionId = '';
     *     // Iterate through all elements
     *     $pagedResponse = $firestoreClient->listDocuments($formattedParent, $collectionId);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     *
     *     // OR iterate over pages of elements
     *     $pagedResponse = $firestoreClient->listDocuments($formattedParent, $collectionId);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param string $parent       The parent resource name. In the format:
     *                             `projects/{project_id}/databases/{database_id}/documents` or
     *                             `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
     *                             For example:
     *                             `projects/my-project/databases/my-database/documents` or
     *                             `projects/my-project/databases/my-database/documents/chatrooms/my-chatroom`
     * @param string $collectionId The collection ID, relative to `parent`, to list. For example: `chatrooms`
     *                             or `messages`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type string $orderBy
     *          The order to sort results by. For example: `priority desc, name`.
     *     @type DocumentMask $mask
     *          The fields to return. If not set, returns all fields.
     *
     *          If a document has a field that is not present in this mask, that field
     *          will not be returned in the response.
     *     @type string $transaction
     *          Reads documents in a transaction.
     *     @type Timestamp $readTime
     *          Reads documents as they were at the given time.
     *          This may not be older than 60 seconds.
     *     @type bool $showMissing
     *          If the list should show missing documents. A missing document is a
     *          document that does not exist but has sub-documents. These documents will
     *          be returned with a key but will not have fields, [Document.create_time][google.firestore.v1beta1.Document.create_time],
     *          or [Document.update_time][google.firestore.v1beta1.Document.update_time] set.
     *
     *          Requests with `show_missing` may not specify `where` or
     *          `order_by`.
     *     @type \Google\ApiCore\RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function listDocuments($parent, $collectionId, $optionalArgs = [])
    {
        $request = new ListDocumentsRequest();
        $request->setParent($parent);
        $request->setCollectionId($collectionId);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }
        if (isset($optionalArgs['mask'])) {
            $request->setMask($optionalArgs['mask']);
        }
        if (isset($optionalArgs['transaction'])) {
            $request->setTransaction($optionalArgs['transaction']);
        }
        if (isset($optionalArgs['readTime'])) {
            $request->setReadTime($optionalArgs['readTime']);
        }
        if (isset($optionalArgs['showMissing'])) {
            $request->setShowMissing($optionalArgs['showMissing']);
        }

        return $this->getPagedListResponse(
            new Call(
                self::SERVICE_NAME.'/ListDocuments',
                ListDocumentsResponse::class,
                $request
            ),
            $this->configureCallSettings('listDocuments', $optionalArgs),
            $this->descriptors['listDocuments']['pageStreaming']
        );
    }

    /**
     * Creates a new document.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedParent = $firestoreClient->anyPathName('[PROJECT]', '[DATABASE]', '[DOCUMENT]', '[ANY_PATH]');
     *     $collectionId = '';
     *     $documentId = '';
     *     $document = new Document();
     *     $response = $firestoreClient->createDocument($formattedParent, $collectionId, $documentId, $document);
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param string $parent       The parent resource. For example:
     *                             `projects/{project_id}/databases/{database_id}/documents` or
     *                             `projects/{project_id}/databases/{database_id}/documents/chatrooms/{chatroom_id}`
     * @param string $collectionId The collection ID, relative to `parent`, to list. For example: `chatrooms`.
     * @param string $documentId   The client-assigned document ID to use for this document.
     *
     * Optional. If not specified, an ID will be assigned by the service.
     * @param Document $document     The document to create. `name` must not be set.
     * @param array    $optionalArgs {
     *                               Optional.
     *
     *     @type DocumentMask $mask
     *          The fields to return. If not set, returns all fields.
     *
     *          If the document has a field that is not present in this mask, that field
     *          will not be returned in the response.
     *     @type \Google\ApiCore\RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Firestore\V1beta1\Document
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function createDocument($parent, $collectionId, $documentId, $document, $optionalArgs = [])
    {
        $request = new CreateDocumentRequest();
        $request->setParent($parent);
        $request->setCollectionId($collectionId);
        $request->setDocumentId($documentId);
        $request->setDocument($document);
        if (isset($optionalArgs['mask'])) {
            $request->setMask($optionalArgs['mask']);
        }

        return $this->startCall(
            new Call(
                self::SERVICE_NAME.'/CreateDocument',
                Document::class,
                $request
            ),
            $this->configureCallSettings('createDocument', $optionalArgs)
        )->wait();
    }

    /**
     * Updates or inserts a document.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $document = new Document();
     *     $updateMask = new DocumentMask();
     *     $response = $firestoreClient->updateDocument($document, $updateMask);
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param Document     $document   The updated document.
     *                                 Creates the document if it does not already exist.
     * @param DocumentMask $updateMask The fields to update.
     *                                 None of the field paths in the mask may contain a reserved name.
     *
     * If the document exists on the server and has fields not referenced in the
     * mask, they are left unchanged.
     * Fields referenced in the mask, but not present in the input document, are
     * deleted from the document on the server.
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type DocumentMask $mask
     *          The fields to return. If not set, returns all fields.
     *
     *          If the document has a field that is not present in this mask, that field
     *          will not be returned in the response.
     *     @type Precondition $currentDocument
     *          An optional precondition on the document.
     *          The request will fail if this is set and not met by the target document.
     *     @type \Google\ApiCore\RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Firestore\V1beta1\Document
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function updateDocument($document, $updateMask, $optionalArgs = [])
    {
        $request = new UpdateDocumentRequest();
        $request->setDocument($document);
        $request->setUpdateMask($updateMask);
        if (isset($optionalArgs['mask'])) {
            $request->setMask($optionalArgs['mask']);
        }
        if (isset($optionalArgs['currentDocument'])) {
            $request->setCurrentDocument($optionalArgs['currentDocument']);
        }

        return $this->startCall(
            new Call(
                self::SERVICE_NAME.'/UpdateDocument',
                Document::class,
                $request
            ),
            $this->configureCallSettings('updateDocument', $optionalArgs)
        )->wait();
    }

    /**
     * Deletes a document.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedName = $firestoreClient->anyPathName('[PROJECT]', '[DATABASE]', '[DOCUMENT]', '[ANY_PATH]');
     *     $firestoreClient->deleteDocument($formattedName);
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param string $name         The resource name of the Document to delete. In the format:
     *                             `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type Precondition $currentDocument
     *          An optional precondition on the document.
     *          The request will fail if this is set and not met by the target document.
     *     @type \Google\ApiCore\RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function deleteDocument($name, $optionalArgs = [])
    {
        $request = new DeleteDocumentRequest();
        $request->setName($name);
        if (isset($optionalArgs['currentDocument'])) {
            $request->setCurrentDocument($optionalArgs['currentDocument']);
        }

        return $this->startCall(
            new Call(
                self::SERVICE_NAME.'/DeleteDocument',
                GPBEmpty::class,
                $request
            ),
            $this->configureCallSettings('deleteDocument', $optionalArgs)
        )->wait();
    }

    /**
     * Gets multiple documents.
     *
     * Documents returned by this method are not guaranteed to be returned in the
     * same order that they were requested.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedDatabase = $firestoreClient->databaseRootName('[PROJECT]', '[DATABASE]');
     *     $documents = [];
     *     // Read all responses until the stream is complete
     *     $stream = $firestoreClient->batchGetDocuments($formattedDatabase, $documents);
     *     foreach ($stream->readAll() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param string   $database     The database name. In the format:
     *                               `projects/{project_id}/databases/{database_id}`.
     * @param string[] $documents    The names of the documents to retrieve. In the format:
     *                               `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
     *                               The request will fail if any of the document is not a child resource of the
     *                               given `database`. Duplicate names will be elided.
     * @param array    $optionalArgs {
     *                               Optional.
     *
     *     @type DocumentMask $mask
     *          The fields to return. If not set, returns all fields.
     *
     *          If a document has a field that is not present in this mask, that field will
     *          not be returned in the response.
     *     @type string $transaction
     *          Reads documents in a transaction.
     *     @type TransactionOptions $newTransaction
     *          Starts a new transaction and reads the documents.
     *          Defaults to a read-only transaction.
     *          The new transaction ID will be returned as the first response in the
     *          stream.
     *     @type Timestamp $readTime
     *          Reads documents as they were at the given time.
     *          This may not be older than 60 seconds.
     *     @type int $timeoutMillis
     *          Timeout to use for this call.
     * }
     *
     * @return \Google\ApiCore\ServerStream
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function batchGetDocuments($database, $documents, $optionalArgs = [])
    {
        $request = new BatchGetDocumentsRequest();
        $request->setDatabase($database);
        $request->setDocuments($documents);
        if (isset($optionalArgs['mask'])) {
            $request->setMask($optionalArgs['mask']);
        }
        if (isset($optionalArgs['transaction'])) {
            $request->setTransaction($optionalArgs['transaction']);
        }
        if (isset($optionalArgs['newTransaction'])) {
            $request->setNewTransaction($optionalArgs['newTransaction']);
        }
        if (isset($optionalArgs['readTime'])) {
            $request->setReadTime($optionalArgs['readTime']);
        }

        return $this->transport->startServerStreamingCall(
            new Call(
                self::SERVICE_NAME.'/BatchGetDocuments',
                BatchGetDocumentsResponse::class,
                $request
            ),
            $this->configureCallSettings('batchGetDocuments', $optionalArgs),
            $this->descriptors['batchGetDocuments']['grpcStreaming']
        );
    }

    /**
     * Starts a new transaction.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedDatabase = $firestoreClient->databaseRootName('[PROJECT]', '[DATABASE]');
     *     $response = $firestoreClient->beginTransaction($formattedDatabase);
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param string $database     The database name. In the format:
     *                             `projects/{project_id}/databases/{database_id}`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type TransactionOptions $options
     *          The options for the transaction.
     *          Defaults to a read-write transaction.
     *     @type \Google\ApiCore\RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Firestore\V1beta1\BeginTransactionResponse
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function beginTransaction($database, $optionalArgs = [])
    {
        $request = new BeginTransactionRequest();
        $request->setDatabase($database);
        if (isset($optionalArgs['options'])) {
            $request->setOptions($optionalArgs['options']);
        }

        return $this->startCall(
            new Call(
                self::SERVICE_NAME.'/BeginTransaction',
                BeginTransactionResponse::class,
                $request
            ),
            $this->configureCallSettings('beginTransaction', $optionalArgs)
        )->wait();
    }

    /**
     * Commits a transaction, while optionally updating documents.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedDatabase = $firestoreClient->databaseRootName('[PROJECT]', '[DATABASE]');
     *     $writes = [];
     *     $response = $firestoreClient->commit($formattedDatabase, $writes);
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param string  $database The database name. In the format:
     *                          `projects/{project_id}/databases/{database_id}`.
     * @param Write[] $writes   The writes to apply.
     *
     * Always executed atomically and in order.
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type string $transaction
     *          If set, applies all writes in this transaction, and commits it.
     *     @type \Google\ApiCore\RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Firestore\V1beta1\CommitResponse
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function commit($database, $writes, $optionalArgs = [])
    {
        $request = new CommitRequest();
        $request->setDatabase($database);
        $request->setWrites($writes);
        if (isset($optionalArgs['transaction'])) {
            $request->setTransaction($optionalArgs['transaction']);
        }

        return $this->startCall(
            new Call(
                self::SERVICE_NAME.'/Commit',
                CommitResponse::class,
                $request
            ),
            $this->configureCallSettings('commit', $optionalArgs)
        )->wait();
    }

    /**
     * Rolls back a transaction.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedDatabase = $firestoreClient->databaseRootName('[PROJECT]', '[DATABASE]');
     *     $transaction = '';
     *     $firestoreClient->rollback($formattedDatabase, $transaction);
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param string $database     The database name. In the format:
     *                             `projects/{project_id}/databases/{database_id}`.
     * @param string $transaction  The transaction to roll back.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type \Google\ApiCore\RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function rollback($database, $transaction, $optionalArgs = [])
    {
        $request = new RollbackRequest();
        $request->setDatabase($database);
        $request->setTransaction($transaction);

        return $this->startCall(
            new Call(
                self::SERVICE_NAME.'/Rollback',
                GPBEmpty::class,
                $request
            ),
            $this->configureCallSettings('rollback', $optionalArgs)
        )->wait();
    }

    /**
     * Runs a query.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedParent = $firestoreClient->anyPathName('[PROJECT]', '[DATABASE]', '[DOCUMENT]', '[ANY_PATH]');
     *     // Read all responses until the stream is complete
     *     $stream = $firestoreClient->runQuery($formattedParent);
     *     foreach ($stream->readAll() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param string $parent       The parent resource name. In the format:
     *                             `projects/{project_id}/databases/{database_id}/documents` or
     *                             `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
     *                             For example:
     *                             `projects/my-project/databases/my-database/documents` or
     *                             `projects/my-project/databases/my-database/documents/chatrooms/my-chatroom`
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type StructuredQuery $structuredQuery
     *          A structured query.
     *     @type string $transaction
     *          Reads documents in a transaction.
     *     @type TransactionOptions $newTransaction
     *          Starts a new transaction and reads the documents.
     *          Defaults to a read-only transaction.
     *          The new transaction ID will be returned as the first response in the
     *          stream.
     *     @type Timestamp $readTime
     *          Reads documents as they were at the given time.
     *          This may not be older than 60 seconds.
     *     @type int $timeoutMillis
     *          Timeout to use for this call.
     * }
     *
     * @return \Google\ApiCore\ServerStream
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function runQuery($parent, $optionalArgs = [])
    {
        $request = new RunQueryRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['structuredQuery'])) {
            $request->setStructuredQuery($optionalArgs['structuredQuery']);
        }
        if (isset($optionalArgs['transaction'])) {
            $request->setTransaction($optionalArgs['transaction']);
        }
        if (isset($optionalArgs['newTransaction'])) {
            $request->setNewTransaction($optionalArgs['newTransaction']);
        }
        if (isset($optionalArgs['readTime'])) {
            $request->setReadTime($optionalArgs['readTime']);
        }

        return $this->transport->startServerStreamingCall(
            new Call(
                self::SERVICE_NAME.'/RunQuery',
                RunQueryResponse::class,
                $request
            ),
            $this->configureCallSettings('runQuery', $optionalArgs),
            $this->descriptors['runQuery']['grpcStreaming']
        );
    }

    /**
     * Streams batches of document updates and deletes, in order.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedDatabase = $firestoreClient->databaseRootName('[PROJECT]', '[DATABASE]');
     *     $request = new WriteRequest();
     *     $request->setDatabase($formattedDatabase);
     *     $requests = [$request];
     *
     *     // Write all requests to the server, then read all responses until the
     *     // stream is complete
     *     $stream = $firestoreClient->write();
     *     $stream->writeAll($requests);
     *     foreach ($stream->closeWriteAndReadAll() as $element) {
     *         // doSomethingWith($element);
     *     }
     *
     *     // OR write requests individually, making read() calls if
     *     // required. Call closeWrite() once writes are complete, and read the
     *     // remaining responses from the server.
     *     $stream = $firestoreClient->write();
     *     foreach ($requests as $request) {
     *         $stream->write($request);
     *         // if required, read a single response from the stream
     *         $element = $stream->read();
     *         // doSomethingWith($element)
     *     }
     *     $stream->closeWrite();
     *     $element = $stream->read();
     *     while (!is_null($element)) {
     *         // doSomethingWith($element)
     *         $element = $stream->read();
     *     }
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type int $timeoutMillis
     *          Timeout to use for this call.
     * }
     *
     * @return \Google\ApiCore\BidiStream
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function write($optionalArgs = [])
    {
        return $this->transport->startBidiStreamingCall(
            new Call(
                self::SERVICE_NAME.'/Write',
                WriteResponse::class
            ),
            $this->configureCallSettings('write', $optionalArgs),
            $this->descriptors['write']['grpcStreaming']
        );
    }

    /**
     * Listens to changes.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedDatabase = $firestoreClient->databaseRootName('[PROJECT]', '[DATABASE]');
     *     $request = new ListenRequest();
     *     $request->setDatabase($formattedDatabase);
     *     $requests = [$request];
     *
     *     // Write all requests to the server, then read all responses until the
     *     // stream is complete
     *     $stream = $firestoreClient->listen();
     *     $stream->writeAll($requests);
     *     foreach ($stream->closeWriteAndReadAll() as $element) {
     *         // doSomethingWith($element);
     *     }
     *
     *     // OR write requests individually, making read() calls if
     *     // required. Call closeWrite() once writes are complete, and read the
     *     // remaining responses from the server.
     *     $stream = $firestoreClient->listen();
     *     foreach ($requests as $request) {
     *         $stream->write($request);
     *         // if required, read a single response from the stream
     *         $element = $stream->read();
     *         // doSomethingWith($element)
     *     }
     *     $stream->closeWrite();
     *     $element = $stream->read();
     *     while (!is_null($element)) {
     *         // doSomethingWith($element)
     *         $element = $stream->read();
     *     }
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type int $timeoutMillis
     *          Timeout to use for this call.
     * }
     *
     * @return \Google\ApiCore\BidiStream
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function listen($optionalArgs = [])
    {
        return $this->transport->startBidiStreamingCall(
            new Call(
                self::SERVICE_NAME.'/Listen',
                ListenResponse::class
            ),
            $this->configureCallSettings('listen', $optionalArgs),
            $this->descriptors['listen']['grpcStreaming']
        );
    }

    /**
     * Lists all the collection IDs underneath a document.
     *
     * Sample code:
     * ```
     * try {
     *     $firestoreClient = new FirestoreClient();
     *     $formattedParent = $firestoreClient->anyPathName('[PROJECT]', '[DATABASE]', '[DOCUMENT]', '[ANY_PATH]');
     *     // Iterate through all elements
     *     $pagedResponse = $firestoreClient->listCollectionIds($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     *
     *     // OR iterate over pages of elements
     *     $pagedResponse = $firestoreClient->listCollectionIds($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     * } finally {
     *     $firestoreClient->close();
     * }
     * ```
     *
     * @param string $parent       The parent document. In the format:
     *                             `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
     *                             For example:
     *                             `projects/my-project/databases/my-database/documents/chatrooms/my-chatroom`
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type \Google\ApiCore\RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws \Google\ApiCore\ApiException if the remote call fails
     * @experimental
     */
    public function listCollectionIds($parent, $optionalArgs = [])
    {
        $request = new ListCollectionIdsRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        return $this->getPagedListResponse(
            new Call(
                self::SERVICE_NAME.'/ListCollectionIds',
                ListCollectionIdsResponse::class,
                $request
            ),
            $this->configureCallSettings('listCollectionIds', $optionalArgs),
            $this->descriptors['listCollectionIds']['pageStreaming']
        );
    }

    /**
     * Initiates an orderly shutdown in which preexisting calls continue but new
     * calls are immediately cancelled.
     *
     * @experimental
     */
    public function close()
    {
        $this->transport->close();
    }
}
