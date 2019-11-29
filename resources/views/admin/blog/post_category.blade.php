@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('admin/home') }}">D.F</a>
        <a class="breadcrumb-item" href="">Blogs</a>
        <span class="breadcrumb-item active">Post category</span>
      </nav>

      <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Post Category List
            <a href="#" class="btn btn-warning" style="float:right;" data-toggle="modal" data-target="#modaldemo1">Add New</a>
          </h6>
      
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Category Name English</th>
                  <th class="wd-15p">Category Name Bengali</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach($postcategory as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->category_name_en }}</td>
                  <td>{{ $row->category_name_bn }}</td>
                  <td>
                    <a href="{{ URL::to('edit/post/category/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ URL::to('delete/post/category/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- BASIC MODAL -->
    <div id="modaldemo1" class="modal fade">
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header pd-y-20 pd-x-25">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Post Category</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
			   @if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			   @endif
          <form action="{{ route('store.post.category') }}" method="post">
          	@csrf
	          <div class="modal-body pd-35">
		        <div class="row">
		          <label class="col-sm-12 form-control-label">Category Name English: <span class="tx-danger">*</span></label>
		          <div class="col-sm-12 mg-t-10 mg-sm-t-0">
		            <input type="text" class="form-control" name="category_name_en" placeholder="Enter Category Name in English" required>
		          </div>
		        </div><!-- row <--><br>
            <div class="row">
              <label class="col-sm-12 form-control-label">Category Name Bengali: <span class="tx-danger">*</span></label>
              <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" name="category_name_bn" placeholder="Enter Category Name in Bengali" required>
              </div>
            </div><!-- row -->
	          </div>
	          <div class="modal-footer">
	            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
	            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
	          </div>
		  </form>

        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->

@endsection