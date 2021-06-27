<h3>A Simple Laravel application to retrieve gists from API</h3>

<Strong>To Install The System Follow The Below Instructions</strong><br>
<ul>
<li>Clone repository to local machine.</li>
<li>Run cmd cp env.example to .env</li>
<li>Run cmd Composer install</li>
<li>Create database</li>
<li>Update database details in .env file</li>
<li>Run cmd php artisan key:generate</li>
<li>Run cmd php artisan config:cache</li>
<li>Run cmd php artisan migrate</li>
</ul>

<Strong>Registering OAuth Application</strong><br>
<ul>
<li>Login to GitHub and go to https://github.com/settings/developers</li>
<li>Click New OAuth App</li>
<li>Enter application name of your choice</li>
<li>Enter Homepage URL as http://127.0.0.1:8000 if you're running it on local server</li>
<li>Enter Authorization callback URL as http://127.0.0.1:8000/login/github/callback if you're running it on local server</li>
<li>Click Register application</li>
<li>Copy Client ID to GITHUB_CLIENT_ID= in .env file</li>
<li>Copy Client Secret to GITHUB_CLIENT_SECRET= in .env file</li>
<li>Run cmd php artisan config:cache</li>
<li>Run cmd php artisan serve and visit http://127.0.0.1:8000</li>
</ul>

<Strong>Application Walkthrough</strong><br>
<ul>
<li>Login using Github</i>
<li>Home page displays all the public gists</li>
<li>Click username above gist to view particular user gists</li>
<li>Click comments to see comments for that gist</li>
<li>Click favourite to mark as favourite</li>
<li>Click on particular gist to view the gist in detail</li>
<li>Click username from the top right corner and click my gist to see your public gists</li>
<li>Click username from the right top corner and click favourites to see your favourite gists</li>
</ul>

<Strong>Technologies Used</strong><br>
<ul>
<li>Laravel Framework With PHP</li>
<li>HTML</li>
<li>Bootstrap (CSS)</li>
<li>Javascript</li>
<li>JQuery</li>
<li>MySQL</li>
</ul>
