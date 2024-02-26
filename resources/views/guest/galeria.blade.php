@extends('layouts.guest')

@section('title', 'Galéria - Dánfok')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" href="css/gallery.css"/>
<div class="wrapper">
    <section class="titleh container-fluid pb-5 pt-20">
        <h1 class="pb-3">Galéria</h1>
        <div class="sargahullam"><img src="svg/hullam_sarga-03.svg"></div>
    </section>
    <div class="container mt-4 pb-5">
        <div class="row main-category-grid d-flex justify-content-center">
            @foreach($categories as $category)
            <div class="col-md-4 col-sm-6 main-category" data-category="{{ $category->id }}">
                <h3 >{{ $category->name }}</h3>
            </div>
            @endforeach
        </div>
    </div>

    @foreach($categories as $category)
    <div class="container mt-4 sub-category-grid d-none pb-5" data-category="{{ $category->id }}">
        <div class="row">
            @foreach($subcategories->where('category_id', $category->id) as $subcategory)
            <div class="col-md-4 col-sm-6 sub-category" data-subcategory="{{ $subcategory->id }}">
                <h4>{{ $subcategory->name }}</h4>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
    <div class="container">
    @foreach($subcategories as $subcategory)
        <div class="image-grid d-none img-gallery-magnific" data-subcategory="{{ $subcategory->id }}">
            <div class="images gallery justify-content-center">
                @foreach($images->where('subcategory_id', $subcategory->id) as $image)
                <div class="magnific-img image">
                    <a class="image-popup-vertical-fit" href="{{ asset('storage/' . $image->image_path) }}">
                        <img src="{{ asset('storage/' . $image->image_path) }}" data-gallery="{{ $subcategory->id }}" alt=""/>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    <div class="clear"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="js/gallery.js"></script>
<script>
    const mainCategories = document.querySelectorAll('.main-category');
    const subCategoryGrids = document.querySelectorAll('.sub-category-grid');
    const imageGrids = document.querySelectorAll('.image-grid');
    let imageGrid = null;

    mainCategories.forEach(category => {
        category.addEventListener('click', () => {
            const categoryId = category.getAttribute('data-category');
            const subCategoryGrid = document.querySelector(`.sub-category-grid[data-category="${categoryId}"]`);

            subCategoryGrids.forEach(grid => {
                if (grid !== subCategoryGrid) {
                    grid.classList.add('d-none');
                }
            });

            subCategoryGrid.classList.toggle('d-none');
            if (imageGrid != null && !imageGrid.classList.contains("d-none")) imageGrid.classList.add("d-none")
        });
    });

    const subCategories = document.querySelectorAll('.sub-category');

    subCategories.forEach(subCategory => {
        subCategory.addEventListener('click', () => {
            const subCategoryId = subCategory.getAttribute('data-subcategory');
            imageGrid = document.querySelector(`.image-grid[data-subcategory="${subCategoryId}"]`);

            imageGrids.forEach(grid => {
                if (grid !== imageGrid) {
                    grid.classList.add('d-none');
                }
            });
            imageGrid.classList.toggle('d-none');
        });
    });

</script>

@endsection
