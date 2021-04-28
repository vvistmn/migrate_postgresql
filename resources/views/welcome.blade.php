<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <p><span style="color:red;">ATTR</span>
                @foreach($attr as $val)
                    <div>id - {{$val->attr_id}}</div>
                    <div>attrValues()</div>
                    <pre>
                    @foreach($val->attrValues as $attr)
                        {{$attr}}
                    @endforeach
                    </pre> 
                @endforeach 
                </p>

                <p><span style="color:red;">ATTR_VALUES</span>
                @foreach($attrValues as $val)
                    <div>id - {{$val->attr_value_id}}</div>
                    <div>attr()</div>
                    <pre>
                        {{$val->attr}}
                    </pre> 
                @endforeach 
                </p>

                <p><span style="color:red;">ED</span>
                @foreach($eDs as $val)
                    <div>id - {{$val->id}}</div>
                    <div>attrValues()</div>
                    <pre>
                    @foreach($val->attrValues as $attr)
                        {{$attr}}
                    @endforeach
                    </pre> 
                @endforeach 
                </p>

                <p><span style="color:red;">ATTR_VALUES (ED)</span>
                @foreach($attrValues as $val)
                    <div>id - {{$val->attr_value_id}}</div>
                    <div>ed()</div>
                    <pre>
                        {{$val->ed}}
                    </pre> 
                @endforeach 
                </p>


                <p><span style="color:red;">DOCUMENT TYPE</span>
                @foreach($documentType as $val)
                    <div>id - {{$val->dt_id}}</div>
                    <div>eds()</div>
                    <pre>
                    @foreach($val->eds as $attr)
                        {{$attr}}
                    @endforeach
                    </pre> 
                @endforeach 
                </p>

                p><span style="color:red;">ED (DOCUMENT TYPE)</span>
                @foreach($eDs as $val)
                    <div>id - {{$val->id}}</div>
                    <div>documentType()</div>
                    <pre>
                        {{$val->documentType}}  
                    </pre> 
                @endforeach 
                </p>

                <p><span style="color:red;">SOURCE</span>
                @foreach($source as $val)
                    <div>id - {{$val->source_id}}</div>
                    <div>eds()</div>
                    <pre>
                    @foreach($val->eds as $attr)
                        {{$attr}}
                    @endforeach
                    </pre> 
                @endforeach 
                </p>

                <p><span style="color:red;">ED (SOURCE)</span>
                @foreach($eDs as $val)
                    <div>id - {{$val->id}}</div>
                    <div>source()</div>
                    <pre>
                        {{$val->source}}  
                    </pre> 
                @endforeach 
                </p>

                <p><span style="color:red;">DOSSIER</span>
                @foreach($dossiers as $val)
                    <div>id - {{$val->id}}</div>
                    <div>eds()</div>
                    <pre>
                    @foreach($val->eds as $attr)
                        {{$attr}}
                    @endforeach
                    </pre> 
                @endforeach 
                </p>

                <p><span style="color:red;">ED (DOSSIER)</span>
                @foreach($eDs as $val)
                    <div>id - {{$val->id}}</div>
                    <div>dossier()</div>
                    <pre>
                        {{$val->dossier}}  
                    </pre> 
                @endforeach 
                </p>


                --------------------------------------------------


                <p><span style="color:red;">FILE (F2)</span>
                @foreach($files as $val)
                    <div>id - {{$val->id}}</div>
                    <div>f2()</div>
                    <pre>
                        @foreach($val->relFileF2 as $attr)
                            {{$attr}}
                        @endforeach
                    </pre> 
                @endforeach 
                </p>

                <p><span style="color:red;">REL FILE (F2)</span>
                @foreach($relFiles as $val)
                    <div>id - {{$val->id}}</div>
                    <div>relFileF2()</div>
                    <pre>
                        @foreach($val->relFileF2 as $attr)
                            {{$attr}}
                        @endforeach
                    </pre> 
                @endforeach 
                </p>
            </div>
        </div>
    </body>
</html>
