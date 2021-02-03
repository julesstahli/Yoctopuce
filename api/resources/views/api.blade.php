
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <style media="screen">
      .highlight table td { padding: 5px; }
.highlight table pre { margin: 0; }
.highlight .gh {
  color: #999999;
}
.highlight .sr {
  color: #f6aa11;
}
.highlight .go {
  color: #888888;
}
.highlight .gp {
  color: #555555;
}
.highlight .gs {
}
.highlight .gu {
  color: #aaaaaa;
}
.highlight .nb {
  color: #f6aa11;
}
.highlight .cm {
  color: #75715e;
}
.highlight .cp {
  color: #75715e;
}
.highlight .c1 {
  color: #75715e;
}
.highlight .cs {
  color: #75715e;
}
.highlight .c, .highlight .ch, .highlight .cd, .highlight .cpf {
  color: #75715e;
}
.highlight .err {
  color: #960050;
}
.highlight .gr {
  color: #960050;
}
.highlight .gt {
  color: #960050;
}
.highlight .gd {
  color: #49483e;
}
.highlight .gi {
  color: #49483e;
}
.highlight .ge {
  color: #49483e;
}
.highlight .kc {
  color: #66d9ef;
}
.highlight .kd {
  color: #66d9ef;
}
.highlight .kr {
  color: #66d9ef;
}
.highlight .no {
  color: #66d9ef;
}
.highlight .kt {
  color: #66d9ef;
}
.highlight .mf {
  color: #ae81ff;
}
.highlight .mh {
  color: #ae81ff;
}
.highlight .il {
  color: #ae81ff;
}
.highlight .mi {
  color: #ae81ff;
}
.highlight .mo {
  color: #ae81ff;
}
.highlight .m, .highlight .mb, .highlight .mx {
  color: #ae81ff;
}
.highlight .sc {
  color: #ae81ff;
}
.highlight .se {
  color: #ae81ff;
}
.highlight .ss {
  color: #ae81ff;
}
.highlight .sd {
  color: #e6db74;
}
.highlight .s2 {
  color: #e6db74;
}
.highlight .sb {
  color: #e6db74;
}
.highlight .sh {
  color: #e6db74;
}
.highlight .si {
  color: #e6db74;
}
.highlight .sx {
  color: #e6db74;
}
.highlight .s1 {
  color: #e6db74;
}
.highlight .s, .highlight .sa, .highlight .dl {
  color: #e6db74;
}
.highlight .na {
  color: #a6e22e;
}
.highlight .nc {
  color: #a6e22e;
}
.highlight .nd {
  color: #a6e22e;
}
.highlight .ne {
  color: #a6e22e;
}
.highlight .nf, .highlight .fm {
  color: #a6e22e;
}
.highlight .vc {
  color: #ffffff;
}
.highlight .nn {
  color: #ffffff;
}
.highlight .ni {
  color: #ffffff;
}
.highlight .bp {
  color: #ffffff;
}
.highlight .vg {
  color: #ffffff;
}
.highlight .vi {
  color: #ffffff;
}
.highlight .nv, .highlight .vm {
  color: #ffffff;
}
.highlight .w {
  color: #ffffff;
}
.highlight {
  color: #ffffff;
}
.highlight .n, .highlight .py, .highlight .nx {
  color: #ffffff;
}
.highlight .nl {
  color: #f92672;
}
.highlight .ow {
  color: #f92672;
}
.highlight .nt {
  color: #f92672;
}
.highlight .k, .highlight .kv {
  color: #f92672;
}
.highlight .kn {
  color: #f92672;
}
.highlight .kp {
  color: #f92672;
}
.highlight .o {
  color: #f92672;
}
    </style>
    <style media="print">
      * {
        -webkit-transition:none!important;
        transition:none!important;
      }
      .highlight table td { padding: 5px; }
.highlight table pre { margin: 0; }
.highlight, .highlight .w {
  color: #586e75;
}
.highlight .err {
  color: #002b36;
  background-color: #dc322f;
}
.highlight .c, .highlight .ch, .highlight .cd, .highlight .cm, .highlight .cpf, .highlight .c1, .highlight .cs {
  color: #657b83;
}
.highlight .cp {
  color: #b58900;
}
.highlight .nt {
  color: #b58900;
}
.highlight .o, .highlight .ow {
  color: #93a1a1;
}
.highlight .p, .highlight .pi {
  color: #93a1a1;
}
.highlight .gi {
  color: #859900;
}
.highlight .gd {
  color: #dc322f;
}
.highlight .gh {
  color: #268bd2;
  background-color: #002b36;
  font-weight: bold;
}
.highlight .k, .highlight .kn, .highlight .kp, .highlight .kr, .highlight .kv {
  color: #6c71c4;
}
.highlight .kc {
  color: #cb4b16;
}
.highlight .kt {
  color: #cb4b16;
}
.highlight .kd {
  color: #cb4b16;
}
.highlight .s, .highlight .sa, .highlight .sb, .highlight .sc, .highlight .dl, .highlight .sd, .highlight .s2, .highlight .sh, .highlight .sx, .highlight .s1 {
  color: #859900;
}
.highlight .sr {
  color: #2aa198;
}
.highlight .si {
  color: #d33682;
}
.highlight .se {
  color: #d33682;
}
.highlight .nn {
  color: #b58900;
}
.highlight .nc {
  color: #b58900;
}
.highlight .no {
  color: #b58900;
}
.highlight .na {
  color: #268bd2;
}
.highlight .m, .highlight .mb, .highlight .mf, .highlight .mh, .highlight .mi, .highlight .il, .highlight .mo, .highlight .mx {
  color: #859900;
}
.highlight .ss {
  color: #859900;
}
    </style>
    <link href="stylesheets/screen-c9d8fa83.css" rel="stylesheet" media="screen" />
    <link href="stylesheets/print-953e3353.css" rel="stylesheet" media="print" />
      <script src="javascripts/all-e033bdd3.js"></script>

    <script>
      $(function() { setupCodeCopy(); });
    </script>
  </head>

  <body class="index" data-languages="[&quot;php&quot;,&quot;javascript&quot;,&quot;elixir&quot;]">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="images/navbar-cad8cdcb.png" alt="" />
      </span>
    </a>
    <div class="toc-wrapper">
      <img src="images/logo-9b85b9a6.png" class="logo" alt="" />
        <div class="lang-selector">
              <a href="#" data-language-name="php">php</a>
              <a href="#" data-language-name="javascript">javascript</a>
              <a href="#" data-language-name="elixir">elixir</a>
        </div>
        <div class="search">
          <input type="text" class="search" id="input-search" placeholder="Search">
        </div>
        <ul class="search-results"></ul>
      <ul id="toc" class="toc-list-h1">
          <li>
            <a href="#introduction" class="toc-h1 toc-link" data-title="Introduction">Introduction</a>
          </li>
          <li>
            <a href="#authentication" class="toc-h1 toc-link" data-title="Authentication">Authentication</a>
          </li>
          <li>
            <a href="#measures" class="toc-h1 toc-link" data-title="Measures">Measures</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-all-measures" class="toc-h2 toc-link" data-title="Get all measures">Get all measures</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#errors" class="toc-h1 toc-link" data-title="Errors">Errors</a>
          </li>
      </ul>
        <ul class="toc-footer">
            <li><a href='https://github.com/slatedocs/slate'>Documentation Powered by Slate</a></li>
        </ul>
    </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
        <h1 id='introduction'>Introduction</h1>
<p>Welcome to the Yocopuce project API! You can use our API to access Yoctopuce project API endpoints, which can get information on various measures in our database.</p>

<p>We have language bindings in PHP, Javascript, and Elixir! You can view code examples in the dark area to the right, and you can switch the programming language of the examples with the tabs in the top right.</p>
<h1 id='authentication'>Authentication</h1>
<p>Yoctopuce project doesn&#39;t uses API keys to allow access to the API.</p>
<h1 id='measures'>Measures</h1><h2 id='get-all-measures'>Get all measures</h2><div class="highlight"><pre class="highlight php tab-php"><code><span class="cp">&lt;?php</span>
<span class="nv">$ch</span> <span class="o">=</span> <span class="nb">curl_init</span><span class="p">();</span> 
<span class="nb">curl_setopt</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="no">CURLOPT_URL</span><span class="p">,</span> <span class="s2">"[endpoint]/api/measures?limit=3"</span><span class="p">);</span> 
<span class="nv">$data</span> <span class="o">=</span> <span class="nb">curl_exec</span><span class="p">(</span><span class="nv">$ch</span><span class="p">);</span> 
<span class="k">echo</span> <span class="nv">$data</span><span class="p">;</span>
<span class="nb">curl_close</span><span class="p">(</span><span class="nv">$ch</span><span class="p">);</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript"><code><span class="c1">// By using axios</span>
<span class="nx">axios</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">[endpoint]/api/measures?limit=3</span><span class="dl">"</span><span class="p">).</span><span class="nx">then</span><span class="p">(</span><span class="nx">data</span> <span class="o">=&gt;</span> <span class="p">{</span>
  <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">data</span><span class="p">);</span>
<span class="p">},</span> <span class="nx">error</span> <span class="o">=&gt;</span> <span class="p">{</span>
  <span class="nx">console</span><span class="p">.</span><span class="nx">error</span><span class="p">(</span><span class="nx">error</span><span class="p">);</span>
<span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight elixir tab-elixir"><code><span class="c1"># By using HTTPoison</span>
<span class="s2">"[endpoint]/api/measures?limit=3"</span>
<span class="o">|&gt;</span> <span class="no">HTTPoison</span><span class="o">.</span><span class="n">get!</span>
<span class="o">|&gt;</span> <span class="no">IO</span><span class="o">.</span><span class="n">inpect</span>
</code></pre></div>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">3</span><span class="p">,</span><span class="w">
    </span><span class="nl">"pression"</span><span class="p">:</span><span class="w"> </span><span class="mf">16.542</span><span class="p">,</span><span class="w">
    </span><span class="nl">"humidity"</span><span class="p">:</span><span class="w"> </span><span class="mf">32.928</span><span class="p">,</span><span class="w">
    </span><span class="nl">"brightness"</span><span class="p">:</span><span class="w"> </span><span class="mf">21.602</span><span class="p">,</span><span class="w">
    </span><span class="nl">"updated_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-27 14:37:22"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"deleted_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-27 14:37:22"</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
    </span><span class="nl">"pression"</span><span class="p">:</span><span class="w"> </span><span class="mf">14.973</span><span class="p">,</span><span class="w">
    </span><span class="nl">"humidity"</span><span class="p">:</span><span class="w"> </span><span class="mf">29.754</span><span class="p">,</span><span class="w">
    </span><span class="nl">"brightness"</span><span class="p">:</span><span class="w"> </span><span class="mf">19.782</span><span class="p">,</span><span class="w">
    </span><span class="nl">"updated_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-27 14:37:17"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"deleted_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-27 14:37:17"</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="nl">"pression"</span><span class="p">:</span><span class="w"> </span><span class="mf">15.878</span><span class="p">,</span><span class="w">
    </span><span class="nl">"humidity"</span><span class="p">:</span><span class="w"> </span><span class="mf">30.435</span><span class="p">,</span><span class="w">
    </span><span class="nl">"brightness"</span><span class="p">:</span><span class="w"> </span><span class="mf">17.987</span><span class="p">,</span><span class="w">
    </span><span class="nl">"updated_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-27 14:37:12"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"deleted_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-27 14:37:12"</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div>
<p>This endpoint retrieves all measures.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET http://yoctopuce.test/api/measures</code></p>
<h3 id='query-parameters'>Query Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Default</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>fromID</td>
<td>numeric</td>
<td>null</td>
<td>Return all measures from the specified ID</td>
</tr>
<tr>
<td>limit</td>
<td>numeric</td>
<td>null</td>
<td>Limit the number of results</td>
</tr>
<tr>
<td>offset</td>
<td>numeric</td>
<td>0</td>
<td>Offset on results</td>
</tr>
<tr>
<td>from</td>
<td>datetime</td>
<td>null</td>
<td>From specified date</td>
</tr>
<tr>
<td>to</td>
<td>datetime</td>
<td>null</td>
<td>To specified date</td>
</tr>
<tr>
<td>pression</td>
<td>boolean</td>
<td>1</td>
<td>If false exclude pression from results</td>
</tr>
<tr>
<td>humidity</td>
<td>boolean</td>
<td>1</td>
<td>If false exclude humidity from results</td>
</tr>
<tr>
<td>brightness</td>
<td>boolean</td>
<td>1</td>
<td>If false exclude brightness from results</td>
</tr>
<tr>
<td>order</td>
<td>string</td>
<td>desc</td>
<td>asc or desc</td>
</tr>
</tbody></table>

<aside class="notice">
Measures are updated every 5 seconds
</aside>
<h1 id='errors'>Errors</h1>
<p>The Kittn API uses the following error codes:</p>

<table><thead>
<tr>
<th>Error Code</th>
<th>Meaning</th>
</tr>
</thead><tbody>
<tr>
<td>400</td>
<td>Bad Request -- Your request is invalid.</td>
</tr>
<tr>
<td>401</td>
<td>Unauthorized -- Access denied.</td>
</tr>
<tr>
<td>403</td>
<td>Forbidden -- The measure requested is hidden for administrators only.</td>
</tr>
<tr>
<td>404</td>
<td>Not Found -- The specified measure could not be found.</td>
</tr>
<tr>
<td>405</td>
<td>Method Not Allowed -- You tried to access a measure with an invalid method.</td>
</tr>
<tr>
<td>406</td>
<td>Not Acceptable -- You requested a format that isn&#39;t json.</td>
</tr>
<tr>
<td>410</td>
<td>Gone -- The measure requested has been removed from our servers.</td>
</tr>
<tr>
<td>418</td>
<td>I&#39;m a teapot.</td>
</tr>
<tr>
<td>429</td>
<td>Too Many Requests -- You&#39;re requesting too many measures! Slow down!</td>
</tr>
<tr>
<td>500</td>
<td>Internal Server Error -- We had a problem with our server. Try again later.</td>
</tr>
<tr>
<td>503</td>
<td>Service Unavailable -- We&#39;re temporarily offline for maintenance. Please try again later.</td>
</tr>
</tbody></table>

      </div>
      <div class="dark-box">
          <div class="lang-selector">
                <a href="#" data-language-name="php">php</a>
                <a href="#" data-language-name="javascript">javascript</a>
                <a href="#" data-language-name="elixir">elixir</a>
          </div>
      </div>
    </div>
  </body>
</html>
