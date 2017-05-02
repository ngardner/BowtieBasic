<div class="page-header">
  <h1>Development</h1>
</div>

<div class="row">
    <div class="col-xs-12">
	
	<div class="panel panel-default">
	    <div class="panel-heading">
		<h3 class="panel-title">MVC Overview</h3>
	    </div>
	    <div class="panel-body">
		<p>MVC stands for Model View Controller, and is the practice of separating these 3 different
		tasks into different parts of code. The Model represents your data, Views are what displays the data,
		and the Controller passes data back and forth between the two.</p>
		<p>In Bowtie, you create an interface which is a collection of Controllers and Views. The most common
		interface is the "frontend" of your website. You may also have a backend or admin interface. You could also
		have an API interface, or whatever else you may need. Models are shared by all interfaces.</p>
		<p>Controllers are PHP files which a developer creates to add logic and pass data around as needed.
		Views are also PHP files, but mostly HTML markup, with PHP being used to echo out data passed in from the view.</p>
	    </div>
	</div>
	
	<div class="panel panel-default">
	    <div class="panel-heading">
		<h3 class="panel-title">Folder Structure</h3>
	    </div>
	    <div class="panel-body">
		<p>Bowtie Basic is lightweight, so the core code is relativtly small. Below is the folder structure of
		a typical project.</p>
		
		<div class="row">
		    <div class="col-md-4">
			<ul class="list-group filesystem">
			    <li class="list-group-item folder">
				<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> config
				<ul class="list-group filesystem">
				    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> environment.php</li>
				    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> init.php</li>
				</ul>
			    </li>
			    <li class="list-group-item folder">
				<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> frontend
				<ul class="list-group filesystem">
				    <li class="list-group-item folder">
					<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> controllers
					<ul class="list-group filesystem">
					    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Page.php</li>
					</ul>
				    </li>
				    <li class="list-group-item folder">
					<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> views
					<ul class="list-group filesystem">
					    <li class="list-group-item folder"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> css</li>
					    <li class="list-group-item folder"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> js</li>
					    <li class="list-group-item folder"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> img</li>
					    <li class="list-group-item folder">
						<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> pages
						<ul class="list-group filesystem">
						    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> home.tpl.php</li>
						</ul>
					    </li>
					    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> default.tpl.php</li>
					    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> foot.tpl.php</li>
					    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> footer.tpl.php</li>
					    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> head.tpl.php</li>
					    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> header.tpl.php</li>
					</ul>
				    </li>
				</ul>
			    </li>
			    <li class="list-group-item folder">
				<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> library
				<ul class="list-group filesystem">
				    <li class="list-group-item folder">
					<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> models
					<ul class="list-group filesystem">
					    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> LogModel.php</li>
					</ul>
				    </li>
				    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Controller.php</li>
				    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Database.php</li>
				    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Dispatcher.php</li>
				    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Model.php</li>
				    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> View.php</li>
				</ul>
			    </li>
			    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> .htaccess</li>
			    <li class="list-group-item file"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> index.php</li>
			</ul>
		    </div>
		    <div clas="col-md-8">
			<p><strong>config/environment.php</strong> is the first file you should edit. This is where you set configurations options such as database configurations,filesystem settings, and error reporting.</p>
			<p><strong>frontend/</strong> is the default frontend interface folder. This is where you will be working most of the time.</p>
			<p><strong>frontend/controllers</strong> this directory and where all your frontend controllers should exist.</p>
			<p><strong>frontend/views</strong> is where all view templates, css files, JavaScript includes, images, and other web assets should go.</p>
			<p><strong>library/</strong> files are the core files that makeup Bowtie Basic. These files should not be edited.</p>
			<p><strong>library/models</strong> is where all Model classes should go. You will be adding a few of these for your project in most cases.</p>
			<p><strong>.htaccess</strong> is a configuration file for Apache, used to assist URL routing.</p>
			<p><strong>index.php</strong> is what starts up Bowtie and handles all requests.</p>
			<p></p>
		    </div>
		</div>
	    </div>
	</div>
	
	<div class="panel panel-default">
	    <div class="panel-heading">
		<h3 class="panel-title">Constants and Global Variables</h3>
	    </div>
	    <div class="panel-body">
		
		<p>Bowtie uses PHP Constants for configuration settings. These are all defined in <em>/config/environment.php</em>. The full list of constants is listed below.</p>
		<dl class="dl-horizontal">
		    <dt>PRODUCT_NAME</dt>
		    <dd>Name of your product or website. Used in page titles, errors, etc.</dd>
		    
		    <dt>INSTALLDIR</dt>
		    <dd>Subdirectory of webroot where Bowtie is installed at.</dd>
		    
		    <dt>DIR</dt>
		    <dd>Filesystem directory where Bowtie is installed at.</dd>
		    
		    <dt>URL</dt>
		    <dd>Full URL to Bowtie install directory.</dd>
		    
		    <dt>DB_SERVER</dt>
		    <dd>Database server IP or URL</dd>
		    
		    <dt>DB_PORT</dt>
		    <dd>Database port to connect to</dd>
		    
		    <dt>DB_USERNAME</dt>
		    <dd>Username used to connect to database server</dd>
		    
		    <dt>DB_PASSWORD</dt>
		    <dd>Password used to connect to database server</dd>
		    
		    <dt>DB_DATABASE</dt>
		    <dd>Name of database to use once connected to database server</dd>
		</dl>
		
		<p>Templates or Views (see <a href=#views">Views</a> for more info) have a set of common variables always assigned to them. They are assigned via the <em>\BowtieFW\View->assignCommons()</em> function. The full list of common view variables are listed below.</p>
		<dl class="dl-horizontal">
		    <dt>Title</dt>
		    <dd>This is the value of the PRODUCT_NAME constant</dd>
		    
		    <dt>URL</dt>
		    <dd>This is the value of the URL constant</dd>
		    
		    <dt>PATH</dt>
		    <dd>This is the relative path to the current interfaces view folder. (ie: /frontend/views/)</dd>
		</dl>
		
		<p><strong>$params</strong> is a global variable that contains all the user supplied data. It is a merged array of $_GET and $_POST data. If files were uploaded, then $params['uploads'] will be equilivant to $_FILES. $params['_urlrequest'] will contain the originally requested URL by the user. The $params variable is passed to the controllers actions when they are executed.</p>
		
	    </div>
	</div>
	
	<div class="panel panel-default">
	    <div class="panel-heading">
		<h3 class="panel-title">Standards and Best Practices</h3>
	    </div>
	    <div class="panel-body">
		<p>Controller filenames</p>
		<p>Action names</p>
		<p>Model filenames</p>
		<p>Database tables</p>
		<p>Interfaces</p>
	    </div>
	</div>
	
	<div class="panel panel-default">
	    <div class="panel-heading">
		<h3 class="panel-title">Routing</h3>
	    </div>
	    <div class="panel-body">
		<p>Routing is very simple in Bowtie Basic. The default route is page/index, so the "Page" controller and the "index" action. This would be your homepage. If a URL is example.com/user/login, Bowtie simply converts this to controller/action. So this url would route to the "User" controller and call the "login" action. Likewise, example.com/blog/article would route to the "Blog" controller and call the "article" action. If a url is example.com/blog, then the "Blog" controller is used and calls the default action "index".</p>
		<p>In the blog/article example, you may be wondering how the blog controller knows which article to show. In this case it doesnt, but if we have a url such as example.com/blog/article/my-first-article, then the action would receive the "my-first-article" part of the URL in the $params variable. The controller's action can then act on this however it wants. See the <a href="#controllers">Controllers</a> section for more info.</p>
		<p>That is all you really need to know about routing, but if you are having issues it may be helpful to know there are three main parts that contribute to routing.
		<ul>
		    <li><em>.htaccess</em>, which reroutes all incoming HTTP requests to index.php</li>
		    <li><em>\BowtieFW\Dispatcher->parseUrl()</em>, which takes the original URL request, and figures out what controller and action to execute.</li>
		    <li><em>index.php</em> decides which interface to use. This is set by calling $objDispatcher->setDirectory('frontend');</li>
		</ul>
		</p>
		<p></p>
		<p>The global variable <em>$params</em> may also be useful for debugging, as it should have a $params['_urlrequest'] value, which is the original URL request by the user.</p>
		
		<p>If the controller/action does not exist, Bowtie will show a 404 page.</p>
	    </div>
	</div>
	
	<div class="panel panel-default">
	    <div class="panel-heading">
		<h3 class="panel-title">Hello World! Tutorial</h3>
	    </div>
	    <div class="panel-body">
		<p>This quick tutorial will show you how to create a controller, an action, and display a template for it. We won't go into many details here, but this
		will get you up and running quickly. For more details, see the <a href="#controller">Controller</a> and <a href="#views">Views</a> sections.</p>
		<p>First please <a href="<?=$URL;?>bowtie/download">download</a> and <a href="<?=$URL;?>bowtie/install">install</a> Bowtie Basic on a server.</p>
		<p>Now we create our first Controller. The controller should be placed in our interfaces controller directory (/frontend/controllers/), and the filename should match the class name. We will name our controller "Helloworld" as an example. Below is the starting point for all Controllers.</p>
		<p><strong>/frontend/controllers/Helloworld.php</strong></p>
		<pre>
&lt;?php
namespace BowtieFW\Frontend;

class Helloworld extends \BowtieFW\Controller {
    
    function __construct() {
	parent::__construct();
    }
    
    // default action
    function actionIndex($params='') {
	
    }
    
}
?&gt;		</pre>
		<p>The quickest way to get "Hello World!" to output, is to simply echo it in our actionIndex method, like so...</p>
		<pre>
// default action
function actionIndex($params='') {
    echo "Hello World!";
}		</pre>
		<p>Now when we goto /helloworld it will output "Hello World!" and nothing else. Wonderful!</p>
		<p>We are normally building websites or a webapp, so we want to output HTML not plain text. Bowtie Basic comes with Twitter Bootstrap and a default layout to get us going. Let's assign content to our layout, and then output the layout. Todo this we start interacting with the View. Controllers already have their view setup and ready to go, we just have to start using it.</p>
		<p>First we assign our content to the layout, <code>$this->view->assign('content','Hello World!');</code>. Then, we output the layout <code>$this->finish();</code>. Our actionIndex method should now look like this...</p>
		<pre>
// default action
function actionIndex($params='') {
    $this->view->assign('content','Hello World!');
    $this->finish();
}		</pre>
		<p>Now when we goto /helloworld it will output our "Hello World!" content within the layout of our site!</p>
		<p>Our message "Hello World!" is being assigned to the view variable "content". This "content" variable is output in the default layout, which is how we see our message.</p>
	    </div>
	</div>
	
	<div class="panel panel-default">
	    <div class="panel-heading">
		<h3 class="panel-title">Models</h3>
	    </div>
	    <div class="panel-body">
		<p>Models are used to get and save data, normally with the help of a MySQL database. They can also use APIs, the filesystem, or something else that we can get or save data to.</p>
		<p>In many PHP Frameworks, the model defines the structure and relationships of the data. In Bowtie, the models data relationships are automatically setup based on naming conventions.</p>
		<h3>Model Requirements</h3>
		<p>Model classes must extend the \BowtieFW\Model object, and their constructor should call the parent constructor. The constructor should also set a value to <em>$this->tableName</em>. Below is the bare minumum needed for a model named "Sample".</p>
		<p><strong>/library/models/SampleModel.php</strong></p>
		<pre>
&lt;?php
namespace BowtieFW\Model;
class Sample extends \BowtieFW\Model {
    function __construct() {
        parent::__construct();
	$this->tableName = 'sample';
    }
}
?&gt;		    
		</pre>
		<p>A Model should exist for every table in the database you create, and the models <em>$this->tableName</em> must match the name of the database table. If you have two tables such as "blog_categories" and "blog_articles", each of these tables must have their own Model.</p>
		
		<h3>Database requirements</h3>
		<p>Bowtie requires certain column names and standards when creating your tables. They are listed below</p>
		<ul>
		    <li><strong>id column</strong> Tables must have an `id` int(11) NOT NULL auto_increment column.</li>
		    <li><strong><em>tableName</em>_id</strong> Columns that end with "_id" are assumed to be related data from another table. Bowtie can load this realated data automatically for you. An exception to this is if the column is named "parent_id", Bowtie won't look for related data in a "parent" table.</li>
		    <li><strong>node</strong> The "node" table name is a special case, and should not be used. It is reserved for future use by Bowtie CMS.</li>
		</ul>
		
		<h3>Model Methods</h3>
		<p>Because we are extending the BowtieFW\Model class, our Model already has all the methods needed to get and save data to a database. Below is a list of methods, and how they are used.</p>
		
		<dl class="dl-code">
		    <dt>$this->save($data)</dt>
		    <dd>
			<p><strong>$data</strong> should be a key=>value array. The key's must match the column names in the table.</p>
			<p>If the key "id" has a value, then the model will UPDATE the data that exists with that id. If "id" is blank or not set, then it will INSERT a new record.</p>
			<p>Returns the id of the saved data, or false on error.</p>
		    </dd>
		    
		    <dt>$this->get($id)</dt>
		    <dd>
			<p><strong>$id</strong> should be id of the record you want to get.</p>
			<p>Returns an associative array of the records data, or false if its not found.</p>
		    </dd>
		    
		    <dt>$this->getRelatedData($id)</dt>
		    <dd>
			<p><strong>$id</strong> should be id of the record you want to get.</p>
			<p>Returns an associative array of the records data. If the table has related data (via <em>tableName_id</em> columns), that data will also be returned at an index named after the tableName.</p>
		    </dd>
		    
		    <dt>$this->getAll()</dt>
		    <dd>
			<p>A helper method that simply returns all records in the models table as an associative array.</p>
		    </dd>
		    
		    <dt>$this->find($filters)</dt>
		    <dd>
			<p><strong>$filters</strong> is an array of key=>values to filter by. The key must match the column name.</p>
			<p>Returns an associative array of all records that match the filters.</p>
		    </dd>
		    
		    <dt>$this->delete($id)</dt>
		    <dd>
			<p><strong>$id</strong> should be id of the record you want to delete.</p>
			<p>Deletes (yes really deletes) data from the database.</p>
		    </dd>
		    
		    <dt>$this->tableExists()</dt>
		    <dd>
			<p>Returns true of the Models table exists in the database, false otherwise.</p>
		    </dd>
		</dl>
		
		<h3>Model->db</h3>
		<p>All Models have an instance of the database ready to go at <em>$this->db</em>. This is useful for creating you own Model methods to interact with the database in unique ways.</p>
		<p>You should use <em>$this->db</em> whenever you need todo more advanced database operations that the default Model Methods cannot accomplish. To use <em>$this->db</em> you should be familiar with the following methods...</p>
		
		<h4>Getting data</h4>
		<p>There are 4 different ways to SELECT data from the database, depending on the type of resultset you want back.</p>
		<p>All four of these get methods accept the same two parameteres, <em>$query</em> and <em>$bindData</em>.</p>
		<dl class="dl-horizontal">
		    <dt>$query</dt>
		    <dd>
			<p>The SQL statement you want to run. The SQL statement should contain either named (:name) or question mark (?) placeholders for which real values will be substituted in from <em>$bindData</em>.</p>
		    </dd>
		    
		    <dt>$bindData</dt>
		    <dd>
			<p>If using named (:name) placeholders, they array should be key=>values, with keys matching the named placeholders. If question marks are used, be sure your array is in the correct order.</p>
		    </dd>
		</dl>
		<h4>SELECT methods</h4>
		<dl class="dl-code">
		    <dt>$this->db->getOne($query,$bindData)</dt>
		    <dd>
			<p>Returns the value of the first column of the first row of the results.</p>
		    </dd>
		    
		    <dt>$this->db->getRow($query,$bindData)</dt>
		    <dd>
			<p>Returns an associative array of the first row of the results.</p>
		    </dd>
		    
		    <dt>$this->db->getCol($query,$bindData)</dt>
		    <dd>
			<p>Returns an array of all the values for the first column of the results.</p>
		    </dd>
		    
		    <dt>$this->db->getAll($query,$bindData)</dt>
		    <dd>
			<p>Returns an array of associative arrays of the results.</p>
		    </dd>
		</dl>
		<h4>Query method</h3>
		<p>To run any other type of query besides SELECT, you will need to use the query method. The parameters <em>$query</em> and <em>$bindData</em> are passed in just like for SELECT methods, however the returned result is different.</p>
		<dl class="dl-code">
		    <dt>$this->db->query($query,$bindData)</dt>
		    <dd>
			<p>Returns a PDOStatement on success execution, or throws an exception if error.</p>
		    </dd>
		</dl>
		
	    </div>
	</div>
	
	<div class="panel panel-default">
	    <div class="panel-heading">
		<h3 class="panel-title">Views</h3>
	    </div>
	    <div class="panel-body">
		<p>Views are what we use to display content to our users. Views are simply PHP template files located in the interfaces views directory.</p>
		<p>See Templating for more info.</p>
	    </div>
	</div>
	
	<div class="panel panel-default">
	    <div class="panel-heading">
		<h3 class="panel-title">Controllers</h3>
	    </div>
	    <div class="panel-body">
		<p>coming soon</p>
	    </div>
	</div>
	
	<div class="panel panel-default">
	    <div class="panel-heading">
		<h3 class="panel-title">Misc</h3>
	    </div>
	    <div class="panel-body">
		<p>Files library</p>
	    </div>
	</div>
	
    </div>
</div>