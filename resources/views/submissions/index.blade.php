<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - FYPOS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('dashboard/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('dashboard/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('dashboard/assets/css/style.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://unpkg.com/feather-icons"></script>


</head>

<body>

  <!-- ======= Header ======= -->
  @include('layout.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layout.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Teacher Dashboard</h1>
      
    </div><!-- End Page Title -->

    <section class="section dashboard">
        {{-- @extends('layouts.app') --}}

    <div class="container">
        <h1>Submissions</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date Added</th>
                    <th>Submission Date</th>
                    <th>Total Marks</th>
                    <th>Submitted</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
             
                @foreach($submissions as $submission)
                    <tr>
                        <td>{{ $submission->title }}</td>
                        <td>{{ $submission->add_date }}</td>
                        <td>{{ $submission->submission_date }}</td>
                        <td>{{$submission->earned_marks??null}}/{{ $submission->total_marks }}</td>
                        <td>@if($submission->date_submitted != null)<a href="{{ asset('storage/documents/'.$submission->id.'/'.$submission->document) }}"target="_blank" >Document  <i data-feather="paperclip"></i></a> @else <span class="badge badge-pill badge-warning">not submitted</span> @endif</td>
                        {{-- <a href="{{ asset('storage/documents/'.$submission->document) }}" >View Document</a> --}}

                        <td>{{ $submission->notes }}</td>
                        <td>
                            <a href="{{ route('submissions.show', $submission->id) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('submissions.edit', $submission->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('submissions.destroy', $submission->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{ route('submissions.create') }}" class="btn btn-success">Create Submission</a>
    </div>

      
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="position:fixed;bottom:0px;">
    <div class="copyright">
      <p align="center">&copy; Copyright <strong><span>FYP</span></strong>. All Rights Reserved</p>
    </div>
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('dashboard/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('dashboard/assets/js/main.js')}}"></script>
  <script>
    feather.replace()
  </script>
</body>

</html>