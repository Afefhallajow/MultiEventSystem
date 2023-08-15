@extends('layouts.appp')
<style>
    #msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
    width:600px;
}
.form-control{
    padding: 2px;
    font-size: 13px;
}

#msform fieldset .form-card {
    /*background: white;*/
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;
    position: relative
}

#msform fieldset {
    /*background: white;*/
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E
}

#msform input,
#msform textarea {
    background: transparent;
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 12px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    font-weight: bold;
    border-bottom: 2px solid skyblue;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #4796b9;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

#msform .action-button:hover,
#msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
}

</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <form id="msform" action="{{route('register_member')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <fieldset data-set="1">
                                <div class="form-card">
                                    <h2 style="text-align:center" class="fs-title">Personal Information </h2><br>
                                    <div class="row box">
                                        <div class="col-md-12 div2">
                                            <label for="member" class="float-left">Doctor Name: </label>
                                            <input type="text" id="name" name="name" placeholder="" required/>
                                        </div>
                                       
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <label for="member" class="float-left"> Hospital</label>
                                             <input type="text" id="hospital" name="hospital"/><br>
                                        </div>
                                    </div>

                        
                                   
                                    <div class="new" dir="rtl" >
                                    
                                   
                            </div>
                                </div><input type="submit" name="next" class="next action-button nextInfoBtn" value="Register" />
                                
                                <p class="errorRquired1" style="color:red"></p>
                                <p class="successMSG" style="color:green"></p>
                                </fieldset>
                        </form>

    </div>
</div>
@endsection