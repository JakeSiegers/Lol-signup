<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Bradley University ACM League Tournament Sign Up</title>
        <meta charset="utf-8">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-switch.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,900' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="js/functions.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="lol_bgDarkener">

        </div>
        <div class="container lol_wrap">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="lol_title">Bradley University League of Legends Tournament!<p class="lead">Sponsored by ACM - Sign up now!</p></h1>
                    <form role="form">
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Team Captain's Real Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Team Captain's Email">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Team Captain's Phone">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Team Name">
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Summoner Name 1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Summoner Name 2">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Summoner Name 3">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Summoner Name 4">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Summoner Name 5">
                                </div>
                            </div>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="lol_checkbox"><p class="lead"> I agree to the <a href="#" onclick="$('#lol_rulesModel').modal('show'); return false;">rules</a> (Seriously, read these)</p>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <h2>Prizes <p class="lead">(The good stuff)</p></h2>
                </div>
            </div>
        </div>

        <div class="modal fade lol_rulesModel" id="lol_rulesModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="lead">The Rules</p>
                        These are the rules. If something is not clear, please email (JrMorris@mail.bradley.edu), or speak with Jordan Morris at the event. <strong>HIS WORD IS FINAL</strong>
                        <ul>
                            <li>All players must abide by Riot's summoner code.</li>
                            <li>All teams must pay $25 admission fee on day of tournament.</li>
                            <li>All players may bring their own gaming equipment, i.e. Laptops, Headsets, etc. (And we really suggest you do)</li>
                                <ul>
                                    <li>However - If they don't, they <strong>must</strong> use the provided equipment.</li>
                                    <li>We cannot guarantee ethernet cables, so please bring your own if you want to be assured a wired connection.</li>
                                </ul>
                            </li>
                            <li><strong>All players</strong> on a team must be present at the tournament location when playing.</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Alright, I'm good.</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
