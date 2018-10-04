@extends('layouts.master')
@section('content')
<nav >
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>
    </nav>
  <div class="container">
    
    <p>logged as <b>37 Chemists</b> <button type = "submit" href="#" class="btn btn-primary">Logout</button></p>
    <h2 class="text-center text-info">Dispensary Requests</h2>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Drugs</th>
              <th scope="col">Prescribed For</th>
              <th scope="col">Prescribed By</th>
             {{-- <th scope="col">Edit</th>
              <th scope="col">Delete</th>--}}
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td><a href="#"><strike class="grey-text">
                Chloroquine (Aralen)
                Quinine sulfate (Qualaquin)
                Hydroxychloroquine (Plaquenil)
                Mefloquine</strike></a></td>
              <td>Otto</td>
              <td><a type="button" data-toggle="modal" href="#history"><b>Dr.Kwame</b></a></td>
              {{--<td><a href="#"><i class="fas fa-edit"></i></a></td>
              <td><a href="#" onclick = "return confirm('Delete?');"><i class="fas fa-trash"></i></a></td>--}}
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>
                <a href="#"><p class="text-danger">
                tetracycline
                doxycycline
                furazolidone
                ciprofloxacin
              </p>
              </a>
              </td>
              <td>Thornton</td>
              <td><a type="button" data-toggle="modal" href="#history"><b>Dr. Habib</b></a></td>
              {{--<td><a href="#"><i class="fas fa-edit"></i></a></td>
              <td><a href="#" onclick = "return confirm('Delete?');"><i class="fas fa-trash"></i></a></td>--}}
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>
                <a href="#"><p class="">
                Chloroquine (Aralen)
                Quinine sulfate (Qualaquin)
                Hydroxychloroquine (Plaquenil)
                Mefloquine
              </p>
              </a>
              </td>
              <td>Thornton</td>
              <td><a type="button" data-toggle="modal" href="#history"><b>Dr. Habib</b></a></td>
              {{--<td><a href="#"><i class="fas fa-edit"></i></a></td>
              <td><a href="#" onclick = "return confirm('Delete?');"><i class="fas fa-trash"></i></a></td>--}}
            </tr>
          </tbody>
      </table>
    </div>
        

</div>


    {{-- Modals Section --}}
    {{-- Modal for viewing Doctor's profile --}}
    <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="History" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      </div>
      <div class="modal-body">
    <div class="card card-profile text-center">
      <img alt="" class="card-img-top" src="images/rawpixel-593598-unsplash">
      <div class="card-block">
      <img alt="" class="img-thumbnail" src="images/profile.jpg">
      <h4 class="card-title">
        Dr. Kwame Owusu
        <small>Public Health</small>
        <small>37 Military Hospital</small>
      </h4>
      <div class="card-links">
        <a class="fa fa-dribbble" href="#"><i class="fab fa-linkedin-in"></i></a>
        <a class="fa fa-twitter" href="#"><i class="fab fa-twitter"></i></a>
        <a class="fa fa-facebook" href="#"><i class="far fa-2x fa-comment-alt"></i></a>

        <br/>

      </div>
      </div>
    </div>

      </div>
    </div>
  </div>    
@endsection