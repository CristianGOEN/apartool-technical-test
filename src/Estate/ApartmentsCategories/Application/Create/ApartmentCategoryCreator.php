<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Application\Create;

use Apartool\Estate\Apartments\Application\Find\ApartmentFinder;
use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Apartool\Estate\ApartmentsCategories\Domain\ApartmentCategory;
use Apartool\Estate\ApartmentsCategories\Domain\ApartmentCategoryRepository;
use Apartool\Estate\Categories\Application\Find\CategoryFinder;
use Apartool\Estate\Categories\Domain\CategoryRepository;
use Apartool\Shared\Domain\Apartments\ApartmentId;
use Apartool\Shared\Domain\Categories\CategoryId;


final class ApartmentCategoryCreator
{
    private ApartmentFinder $apartmentFinder;
    private CategoryFinder $categoryFinder;

    public function __construct(private ApartmentCategoryRepository $repository, private ApartmentRepository $apartmentRepository, private CategoryRepository $categoryRepository)
    {
        $this->apartmentFinder = new ApartmentFinder($apartmentRepository);
        $this->categoryFinder = new CategoryFinder($categoryRepository);
    }

    public function __invoke(CreateApartmentCategoryRequest $request): void
    {
        $this->apartmentFinder->__invoke(new ApartmentId($request->apartmentId()));
        $this->categoryFinder->__invoke(new CategoryId($request->categoryId()));

        $apartmentId = new ApartmentId($request->apartmentId());
        $categoryId = new CategoryId($request->categoryId());


        $apartmentCategory = ApartmentCategory::create(
            $apartmentId,
            $categoryId
        );

        $this->repository->save($apartmentCategory);
    }
}
