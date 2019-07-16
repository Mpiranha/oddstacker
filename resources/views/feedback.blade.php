@extends('layouts.layout')

@section('page')
    <div class="container bg-land px-0">
        <div class="light-shade">

            <main-nav title="TOKEN"></main-nav>

            <div class="px-2">

                <div class="row mt-4">
                    <div class="col-12">
                        <ul class="ref-nav nav nav-tabs justify-content-between b-0 mt-2 mx-3">
                            <li id="card-nav" class="ref-tab text-center"><a class="text-light text-uppercase active" data-toggle="tab" href="#feedback">FEEDBACK</a></li>
                            <li id="bank-nav" class="ref-tab text-center"><a class="text-light text-uppercase" data-toggle="tab" href="#survey">QUICK SURVEY</a></li>
                        </ul>

                        <div class="tab-content mt-4">
                            <div id="feedback" class="tab-pane fade in active show">
                                <form action="" method="post">
                                    <div class="desc-box mb-2">
                                        <ul class="feed-back-list">
                                            <li>dndmndbmmbasmmbnambdambd</li>
                                            <li>dndmndbmmbasmmbnambdambd</li>
                                            <li>dndmndbmmbasmmbnambdambd</li>
                                        </ul>
                                    </div>

                                    <div class="desc-box input-box mb-3">
                                          <textarea class="form-control clear-bg border-0" name="feedback-message" id="" rows="3">
                                            Type your feedback
                                          </textarea>
                                    </div>

                                    <div class="mt-2 text-center mb-5">
                                        <button class="btn w-40 submit-feed border-1">SUBMIT</button>
                                    </div>
                                </form>
                            

                                
                                
                                
                            </div>

                            <div id="survey" class="tab-pane fade">
                                <div class="ref-level-box mt-5 mb-3">
                                    <form action="" method="post">
                                        
                                        <div class="d-flex flex-column question-box">
                                            <div class="number">1</div>
                                            <div class="question">
                                                ARE YOU SATISFIED WITH OUR CUSTOMER 1 SERVICE?
                                            </div>
                                            <div class="option">
                                                <input checked type="radio" name="question-satisfied" id="yes" value="Yes">
                                                Yes
                                            </div>
                                            <div class="option">
                                                <input type="radio" name="question-satisfied" id="no" value="No">
                                                No
                                            </div>
                                            <div class="option">
                                                <input type="radio" name="question-satisfied" id="yes" value="yes">
                                                INDIFFERENT
                                            </div>
                                        </div>
                                    
                                        <div class="d-flex flex-column question-box">
                                            <div class="number">2</div>
                                            <div class="question">
                                                WHAT WOULD YOU RATHER IT CHANGED?
                                            </div>
                                            <div class="option">
                                                  <textarea class="form-control clear-bg border-0" name="" id="" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="mt-2 text-center mb-5">
                                            <button class="btn w-40 submit-feed border-1">SUBMIT</button>
                                        </div>
                                        
                                    </form>

                                 </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer-comp></footer-comp>
        </div>
    </div>
@endsection

