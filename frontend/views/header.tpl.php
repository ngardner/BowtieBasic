<!-- HEADER -->
<header>
   
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#example-navbar-mainnav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=URL;?>"><img src="<?=$URL;?>logo.png" alt="<?=PRODUCT_NAME;?>" title="<?=PRODUCT_NAME;?>"/></a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="example-navbar-mainnav">
                <ul class="nav navbar-nav">
                    <li><a href="<?=$URL;?>bowtie/download">Download</a></li>
                    <li><a href="<?=$URL;?>bowtie/install">Install</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Development <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=$URL;?>bowtie/development#mvc">Dev 1</a></li>
                            <li><a href="<?=$URL;?>bowtie/development#interfaces">Dev 2</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=$URL;?>bowtie/development#controllers">Dev 3</a></li>
                            <li><a href="<?=$URL;?>bowtie/development#models">Dev 4</a></li>
                            <li><a href="<?=$URL;?>bowtie/development#views">Dev 5</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Templating <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=$URL;?>bowtie/templating">Design 1</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=$URL;?>bowtie/templating">Design 2</a></li>
                            <li><a href="<?=$URL;?>bowtie/templating">Design 3</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://github.com/ngardner/BowtieBasic" target="_blank">GitHub</a></li>
                    <li><a href="<?=$URL;?>bowtie/donate">Donate</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
    
</header>