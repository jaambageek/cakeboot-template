<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Template Setup']) ?>

<?= $this->element('SiteManager.Bootstrap/section', [
	'title' => '1: Setup Database',
	'body' => 'Configure your database connection in <code>config/app.php</code>.'
]); ?>

<?= $this->element('SiteManager.Bootstrap/section', [
	'title' => '2: Setup Tables',
	'body' => 'Click this '. $this->Html->link('button', '/sitemgr/tables', ['class' => 'btn btn-sm btn-primary']) .' and create the tables listed.'
]); ?>

<?= $this->element('SiteManager.Bootstrap/section', [
	'title' => '3: Enable User Authentication',
	'body' => 'Uncomment the following lines of code.'
]); ?>

<p class="lead">In <code>src/Controller/AppController</code></p>
<pre>//$this->loadComponent('CakeDC/Users.UsersAuth');</pre>

<p class="lead">In <code>src/Controller/PagesController</code></p>
<pre>//$this->Auth->allow();</pre>

<?= $this->element('SiteManager.Bootstrap/section', [
	'title' => '4: Register Yourself',
	'body' => 'Click '. $this->Html->link('here', '/users/users/register', ['class' => 'btn btn-sm btn-primary']) .' to go to the registration page.'
]); ?>

<?= $this->element('SiteManager.Bootstrap/section', [
	'title' => '5: Make Yourself a Superuser',
	'body' => 'Once your account has been created, you must make yourself a superuser (admin) manually in the database. From the Users table, change the superuser field to a 1.'
]); ?>

<?= $this->element('SiteManager.Bootstrap/section', [
	'title' => '6: Replace This Page and Enjoy!',
	'body' => 'Make sure to replace this page at <code>src/Template/Pages/home.ctp</code> and you are ready to start building.'
]); ?>