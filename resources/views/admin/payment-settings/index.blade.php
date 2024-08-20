@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Settings</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-cod-list" data-toggle="list" href="#list-cod" role="tab">COD</a>
                                    <a class="list-group-item list-group-item-action" id="list-fpx-list" data-toggle="list" href="#list-fpx" role="tab">FPX</a>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="tab-content" id="nav-tabContent">
                                    @include('admin.payment-settings.sections.cod-setting')
                                    @include('admin.payment-settings.sections.fpx-setting')
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
