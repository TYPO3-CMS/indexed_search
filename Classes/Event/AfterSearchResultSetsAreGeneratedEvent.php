<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace TYPO3\CMS\IndexedSearch\Event;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\View\ViewInterface;

/**
 * Allows listeners to modify complete search result sets.
 *
 * This event is dispatched in SearchController::searchAction() after all
 * result sets have been created. Listeners can modify complete result sets,
 * including pagination, rows, section data, and category metadata.
 */
final class AfterSearchResultSetsAreGeneratedEvent
{
    public function __construct(
        private array $resultSets,
        private readonly array $searchData,
        private readonly array $searchWords,
        private readonly ViewInterface $view,
        private readonly ServerRequestInterface $request,
    ) {}

    public function getResultSets(): array
    {
        return $this->resultSets;
    }

    public function setResultSets(array $resultSets): void
    {
        $this->resultSets = $resultSets;
    }

    public function getSearchData(): array
    {
        return $this->searchData;
    }

    public function getSearchWords(): array
    {
        return $this->searchWords;
    }

    public function getView(): ViewInterface
    {
        return $this->view;
    }

    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }
}
