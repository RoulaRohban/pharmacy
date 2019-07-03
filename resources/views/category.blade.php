   @extends('welcomm')

@section('content')
  
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 href="welcome1" class="panel-title">
                                        <a  href="welcome1" style="color:#5bd1d7; font-size: 20px ">    
                                            - Antibiotics
                                        </a>
                                    </h4>
                                </div>
                            
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a  href="welcome2"  style="color:#5bd1d7; font-size: 20px ">
                                            
                                        - Pankillers & Antihypertensives                                        </a>
                                    </h4>
                                </div>
                            
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a  href="welcome3" style="color:#5bd1d7; font-size: 20px ">
                                            - Vitamins & Minerals
                                        </a>
                                    </h4>
                                </div>
                            
                            </div>
                                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a  href="welcome4"  style="color:#5bd1d7; font-size: 20px ">
                                            
                                            - Food Supplements
                                        </a>
                                    </h4>
                                </div>
                        
                            </div>

                        
                    
                        

                         <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a  href="welcome5" style="color:#5bd1d7; font-size: 20px ">
                                            - Herbal product
                                        </a>
                                    </h4>
                                </div>
                            
                            </div> 


                         <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a  href="welcome6" style="color:#5bd1d7; font-size: 20px ">
                                            - Anti-obesity 
                                        </a>
                                    </h4>
                                </div>
                            
                            </div> 
                            </div><!--/category-products--> 

                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/logoo.jpg" alt="" width="280" height="430" />
                        </div><!--/shipping-->
                    
                    </div>
                </div>
                
                
@yield('contentt')
            </div>
        </div>
    </section>
    @endsection