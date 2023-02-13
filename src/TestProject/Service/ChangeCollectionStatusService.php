<?php

namespace App\TestProject\Service;

use Psr\Log\LoggerInterface;

use function array_key_exists;

class ChangeCollectionStatusService
{
    /**
     * @var BrandStorageService
     */
    private BrandStorageService $brandStorageService;
    /**
     * @var CollectionStorageService
     */
    private CollectionStorageService $collectionStorageService;
    /**
     * @var UserAuthenticationService
     */
    private UserAuthenticationService $userAuthenticationService;
    private LoggerInterface $logger;

    public function __construct(
        UserAuthenticationService $userAuthenticationService,
        CollectionStorageService $collectionStorageService,
        BrandStorageService $brandStorageService,
        LoggerInterface $logger
    )
    {
        $this->userAuthenticationService = $userAuthenticationService;
        $this->collectionStorageService = $collectionStorageService;
        $this->brandStorageService = $brandStorageService;
        $this->logger = $logger;
    }

    public function changeCollectionStatus(string $collectionName): bool
    {
        $currentUser = $this->userAuthenticationService->getCurrentUser();

        if(!$this->userAuthenticationService->isAbleToChangeCollection()){
            $this->logger->error(
                'User cannot change collection',
                [
                    'user' => $currentUser->getName(),
                    'userId' => $currentUser->getId()
                ]
            );
            return false;
        }

        $collectionData = $this->collectionStorageService->getCollectionByName($collectionName);

        if(empty($collectionData)){
            $this->logger->error(
                'Collection data is empty',
                [
                    'collection' => $collectionName
                ]
            );
            return false;
        }

        if(!array_key_exists('brandId',$collectionData)){
            $this->logger->error(
                'brand id not found in collection data',
                [
                    'collectiondData' => $collectionData
                ]
            );
            return false;
        }

        $brand = $this->brandStorageService->getById((int)$collectionData['brandId']);


        return true;
    }
}