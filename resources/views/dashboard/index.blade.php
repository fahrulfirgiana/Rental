@extends('layout')
@section('content')

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">DataTable Kamar</h6>
	</div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive">
            </div><div class="gallery">
              <a target="_blank" href="img_5terre.jpg">
                <img src="fotokamar/221201111742.jpg" alt="Cinque Terre" width="600" height="400">
              </a>
              <div class="desc">Kamar VIP</div>
            </div>
            
            <div class="gallery" style="d-inline">
              <a target="_blank" href="img_forest.jpg">
                <img src="fotokamar/221201112021.jpg" alt="Forest" width="600" height="400">
              </a>
              <div class="desc">Kamar Biasa</div>
            </div>
          </div>
                </div>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
      </div>
      </div>
      </div>
      </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  
@endsection
