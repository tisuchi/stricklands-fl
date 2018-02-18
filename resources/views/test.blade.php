@extends('admin.main')

@section('content')



<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

<!-- Main Content begin -->

<div class="app-content content">
    <div class="content-wrapper">
      
            <div class="content-header row">
                <div class="col-12">
                <h1>Admin Dashboard</h1>
                </div>
            </div>
            <hr>
            
      <div class="content-body">

        <section id="configuration">
                    
                    
          <div class="row">
            <div class="col-12">
                
                <h2 class="text-center pt-5 mt-5">
                    Hi, {{ Auth::user()->fld_usr_fname }} 
                </h2>

                <div class="form-group">
                  <!-- Button trigger modal -->
                  

                    <?php 
                        for($i = 1; $i < 10; $i++){
                    ?>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#default" @click="showModal({{ $i }})">
                            Launch Modal
                        </button>      
                    <?php
                        }
                    ?>


                  <!-- Modal -->
                  <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel1"> @{{ userData.fld_usr_fname }}</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h5>Check First Paragraph</h5>
                          <p>Oat cake ice cream candy chocolate cake chocolate
                            cake cotton candy dragée apple pie. Brownie carrot
                            cake candy canes bonbon fruitcake topping halvah.
                            Cake sweet roll cake cheesecake cookie chocolate
                            cake liquorice. Apple pie sugar plum powder donut
                            soufflé.
                          </p>
                          <p>Sweet roll biscuit donut cake gingerbread. Chocolate
                            cupcake chocolate bar ice cream. Danish candy
                            cake.
                          </p>
                          <hr>
                          <h5>Some More Text</h5>
                          <p>Cupcake sugar plum dessert tart powder chocolate
                            fruitcake jelly. Tootsie roll bonbon toffee danish.
                            Biscuit sweet cake gummies danish. Tootsie roll
                            cotton candy tiramisu lollipop candy cookie biscuit
                            pie.
                          </p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-outline-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                

                @{{ userData }}



            </div>
          </div>
        </section>
    </div>
</div>



<script src="{{asset('admin_assets/js/mainjs/inventory_search.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>


<script>


    $('.call-pop-over-function').hover(
        function() {
            var id = $( this ).attr("data-id");
            $("#popover-"+id).popover({ trigger: "hover" });
        }
    );


    $('.call-modal').hover(
        function() {
            var id = $( this ).attr("data-id");
            $("#popover-"+id).popover({ trigger: "hover" });
        }
    );


    new Vue({
        el: '.app-content',

        data: {
            passingData: 0,
            userData: ''
        },

        methods: {
            showModal: function(id) {
                /*this.passingData = true;*/
                this.passingData = id;
                $.getJSON('http://localhost/php/freelancer/stricklands/public/gettestdata/'+this.passingData, function(messages){
                    this.userData = messages;
                }.bind(this));
            }
        }
    });


</script>



@stop