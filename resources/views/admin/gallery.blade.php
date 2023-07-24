@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <!-- ... Your existing content ... -->
    
        @if(Session::has('success'))
            <div class="alert alert-success mt-4">
                {{ Session::get('success') }}
            </div>
        @endif
    
        @if(Session::has('error'))
            <div class="alert alert-danger mt-4">
                {{ Session::get('error') }}
            </div>
        @endif
    
        <!-- ... Continue with the rest of your content ... -->
    </div>
    <h1>Galéria Adminisztráció</h1>

        <!-- Kategória űrlap -->
    <div class="card">
        <div class="card-header">
            Kategória hozzáadása
        </div>
        <div class="card-body">
            <form action="{{ route('admin.gallery.storeCategory') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="categoryName">Kategória neve</label>
                    <input type="text" name="name" id="categoryName" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Kategória létrehozása</button>
            </form>
        </div>
    </div>

    <!-- Kategóriák megjelenítése -->
    <div class="mt-4">
        <h2>Kategóriák</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Név</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <form action="{{ route('admin.gallery.destroyCategory', $category) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Alkategória űrlap -->
    <div class="mt-4">
        <div class="card">
            <div class="card-header">
                Alkategória hozzáadása
            </div>
            <div class="card-body">
                <form action="{{ route('admin.gallery.storeSubcategory') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="categorySelect">Kategória</label>
                        <select name="category_id" id="categorySelect" class="form-control" required>
                            <option value="">Kategória kiválasztása</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategoryName">Alkategória neve</label>
                        <input type="text" name="name" id="subcategoryName" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Alkategória létrehozása</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Alkategóriák megjelenítése -->
    <div class="mt-4">
        <h2>Alkategóriák</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Kategória</th>
                    <th>Név</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $subcategory)
                    <tr>
                        <td>{{ $subcategory->category->name }}</td>
                        <td>{{ $subcategory->name }}</td>
                        <td>
                            <form action="{{ route('admin.gallery.destroySubcategory', $subcategory) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Kép űrlap -->
    <div class="mt-4">
        <div class="card">
            <div class="card-header">
                Kép hozzáadása
            </div>
            <div class="card-body">
                <form action="{{ route('admin.gallery.storeImage') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="subcategorySelect">Alkategória</label>
                        <select name="subcategory_id" id="subcategorySelect" class="form-control" required>
                            <option value="">Alkategória kiválasztása</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imageFiles">Képek</label>
                        <input type="file" name="images[]" id="imageFiles" class="form-control-file" multiple accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Képek feltöltése</button>
                </form>                    
            </div>
        </div>
    </div>

    <!-- Képek megjelenítése -->
    <div class="mt-4">
        <h2>Képek</h2>
        <div class="row">
            @foreach ($images as $image)
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="Kép">
                        <div class="card-body">
                            <form action="{{ route('admin.gallery.destroyImage', $image) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Törlés</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
 