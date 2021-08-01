<header id="site-header" class="site-header" >
<div style="background-color:#3c3a3b21;">
        <div class="container"><span class="fl" style="float:left;line-height:34px">Welcome to KNTECH !</span><span class="fr" style="float:right ;line-height:34px"><a rel="nofollow" href="mailto:marketing@koontech.com"><div style="font-size:16px;color:rgb(56, 56, 56);background:url(https://www.koontech.com/images/footemail.png) left no-repeat;padding-left:40px">marketing@koontech.com</div></a></span></div>
</div>
    <div class="container">


		<nav class="navbar" role="navigation">
		<div class="navbar-header">
			<button class="btn btn-primary navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">MENU</button>
			<a class="navbar-brand" href="/" data-gta="event" data-category="out-top-nav" data-action="tb logo" onfocus="this.blur()"><img src="{{asset('backend/assets/images/logo.png')}}" alt="" center center no-repeat></a>
		</div>
 
        <div class="lang">
            <div class="topform">
                        <form id="searchform" name="searchform" method="post" action="product.html">
						<input type="text" name="SearchKey" id="SearchKey" class="topkeyword" required>
                        <input name="Submit" class="topsubmit" style="top:11px" type="submit" value="">
                     </form></div>
            <div class="toplang">
            <div class="dropdown">
                <button type="button" class="langtop dropdown-toggle" id="dropdownMenu1" 
                        data-toggle="dropdown">
                    Language
                    <span class="caret"></span>
                </button>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="/"><img style="width: 16px;" src="/img/english.png" /> ENGLISH</a>
                    </li>
                    <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="https://www.koontech.cn/"><img style="width: 16px;" src="/img/cn.png" /> 中文版</a>
                    </li>

                    <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="/Fre/"><img style="width: 16px;" src="/img/French.png" />français</a>
                    </li>
 <!-- 
                    <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="/german/"><img style="width: 16px;" src="/img/German.png" /> Deutsche</a>
                    </li>

                    <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="/italian/"><img style="width: 16px;" src="/img/Italian.png" /> Italiano</a>
                    </li>

                    <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="/russian/"><img style="width: 16px;" src="/img/Russian.png" /> русский</a>
                    </li>
  -->
                    <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="/spain/"><img style="width: 16px;" src="/img/Spanish.png" /> Español</a>
                    </li>
 <!-- 
                    <li role="presentation">
                        <a rel="nofollow" rel="nofollow" role="menuitem" tabindex="-1" href="/portuguese/"><img style="width: 16px;" src="/img/Portuguese.png" /> Português</a>
                    </li>
  -->
 <!--
                    <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="/dutch/"><img style="width: 16px;" src="/img/Dutch.png" /> Nederlands</a>
                    </li>
                    <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="/greek/"><img style="width: 16px;" src="/img/Greek.png" /> Ελληνικά</a>
                    </li>
                   <!-- <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="/japanese/"><img style="width: 16px;" src="/img/Japanese.png" /> Japanese</a>
                    </li>
                     --> 
 <!--
                    <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="/korean/"><img style="width: 16px;" src="/img/Korean.png" /> 한국어</a>
                    </li>
                    
-->    

                    <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="/Arabic/"><img style="width: 16px;" src="/img/Arabic.png" /> عربى</a>
                    </li>
 <!--
                     <li role="presentation">
                        <a rel="nofollow" role="menuitem" tabindex="-1" href="/turkish/"><img style="width: 16px;" src="/img/Turkish.png" /> Türk</a>
                    </li> 
-->            
                </ul>
            </div>      
            </div>  
        </div>
        
		<div class="collapse navbar-collapse">
        
			<div class="items-wrap">
            <a style="color:red;" href="{{route('index')}}">HOME</a>
            @foreach (App\Models\Category::orderBy('priority', 'asc')->where('parent_id', NULL)->get() as $parent)
                <ul class="navbar-button list-inline style="margin-top:30px;">
                    <li class="switch-locale-wrap" >
                        <div class="dropdown switch-locale">
                            <a rel="nofollow" href="{{route('categories.show' , $parent->id)}}" class="dropdown-toggle  zh" data-toggle="">{{$parent->name}}</a>
                            
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                                        <li><a rel="nofollow" href="{{route('categories.show' , $child->id)}}" rel="nofollow">{{$child->name}}</a></li>
                                    @endforeach
                                </ul>    
						</div>
					</li>
				</ul>
                @endforeach
                <a style="margin-top:20px;" href="{{route('contact')}}">CONTACT US</a>
            </div>
            
		</div>
        
       

		</nav>
	</div>
  </header>