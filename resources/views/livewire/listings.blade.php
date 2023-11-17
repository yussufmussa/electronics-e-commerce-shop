<div>

    <div class="row m-2">
        <div class="col-md-3">
            <input type="text" wire:model="searchByName" class="form-control" placeholder="search listings">
        </div>

        <div class="col-md-3">

            <select wire:model="searchByCategory" name="category_id" class="form-control">
                <option value="">--Select Category--</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">

            <select wire:model="searchByLocation" name="city_id" class="form-control">
                <option value="">--Select City--</option>
                @foreach ($cities as $city)
                <option value="{{$city->id}}">{{$city->city_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">

            <select wire:model="searchByStatus" name="status" class="form-control">
                <option value="">--Select Status--</option>
                <option value="1">Active</option>
                <option value="0">Deactivated</option>

            </select>

        </div>

    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table id="listingDT" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Listing Name</th>
                                    <th>City</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($allListings) > 0)
                                @foreach ($allListings as $key => $listing)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><img src="{{asset(asset('photos/listing/logo/'.$listing->logo))}}" width="100px" height="100" class="img-thumbnail"></td>
                                    <td>{{$listing->name}}</td>
                                    <td>{{$listing->city->city_name}}</td>
                                    <td>{{$listing->category->name}}</td>
                                    <td> <input type="checkbox" id="switch{{$listing->id}}" switch="none" class="switch" name="status" {{ $listing->status == 1 ? 'checked' : '' }} value="{{$listing->id}}">
                                        <label for="switch{{$listing->id}}" data-on-label="On" data-off-label="Off"></label>
                                    </td>

                                    <td>
                                        <a href="{{route('admin.listings.edit', $listing->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <a onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="deleteListing('{{$listing->id}}')" class="btn btn-sm btn-danger">delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" class="text-center"><span class="text-danger">Create listing</span> <a href="{{route('admin.listings.create')}}">here</a></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


    </div>