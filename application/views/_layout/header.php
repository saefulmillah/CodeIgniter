<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">

    <!-- SEO -->
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.css"/>
 
    <style>
    table.dataTable td {
      font-size: 0.6em;
    }
    table.dataTable th {
      font-size: 0.6em;
    }
    table.dataTable tr.dtrg-level-0 td {
      font-size: 0.7em;
    }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .jumbotron {
        padding-top: 3rem;
        padding-bottom: 3rem;
        margin-bottom: 0;
        background-color: #fff;
      }
      @media (min-width: 768px) {
        .jumbotron {
          padding-top: 6rem;
          padding-bottom: 6rem;
        }
      }

      .jumbotron p:last-child {
        margin-bottom: 0;
      }

      .jumbotron h1 {
        font-weight: 300;
      }

      .jumbotron .container {
        max-width: 40rem;
      }

      footer {
        padding-top: 3rem;
        padding-bottom: 3rem;
      }

      footer p {
        margin-bottom: .25rem;
      }
    </style>

  </head>
  <body>

  <!-- HEADER -->
  <header>
    <!-- <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Follow on Twitter</a></li>
              <li><a href="#" class="text-white">Like on Facebook</a></li>
              <li><a href="#" class="text-white">Email me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div> -->
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
          <strong>Dashboard</strong>
        </a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
        <form class="form-inline my-2 my-lg-0">
          <select class="custom-select mr-sm-2" id="ChooseBranch">
            <option value="1" selected>JORR-S</option>
            <option value="2">ATP</option>
            <option value="3">Medan-Binjai</option>
            <option value="4">Palindra</option>
            <option value="5">Bakter</option>
            <option value="6">Terpeka</option>
            <option value="7">Permai</option>
            <option value="8">Sibanceh</option>
          </select>
          <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="btnSubmit">Search</button>
        </form>
      </div>
      
    </div>
  </header>
  <!-- /HEADER -->