BluePlate
==========

**A Starter WordPress Theme Forked by Terence Devine**

I created this Starter Theme to tackle some of the little issues that I seemed to be dealing with for every project, such as base SCSS style sheets, linked scripts, pagination function, stripped down markup, and the array of WordPress files needed for a proper theme.

## How to Use

There are a few things you may want to know before starting with this theme to cut down the number of head scratches along the way - Enjoy!

### SCSS

I prefer to use the SCSS syntax of the Sass language instead of vanilla CSS, as it helps immensly with development.  A few of my favorite features are:

* nested attributes
* mixins (with compass)
* variables
* extending styles
* @import
* Many more!

I would highly suggest <a href="http://incident57.com/codekit/" target="_blank">CodeKit</a> for all your pre-processor needs...  It is also good for javascript concatination, image compression, linting, autoreload and more!

### Normalize

My CSS reset of choice is <a href="http://necolas.github.com/normalize.css/" target="_blank">normalize.css</a> (scss/normalize.scss) - if you are used to using the popular reset.css, it may throw you off as it doesn't strip ALL styles - but instead leaves the typical base styles (ie: margin on h1, h2, ul, ol, etc.)

### Aria Roles

I use Aria roles as my attribute selectors for the main sections of my site.  You may notice them on, but not limited to:

* header[role=banner]
* article[role=main]
* section[role=main]
* div[role=main]
* footer[role=contentinfo]

### Grid System

The grid system used needs the following basic markup:

```html
<div class="grid">
	<div class="grid-2-3">
		<h1>Main Content</h1>
	</div>
	<div class="grid-1-3">
		<h2>Sidebar Content</h2>
	</div>
</div>
```

For more info you can view (and fork!) my example on CodePen: <a href="http://codepen.io/tdevine33/pen/gaokG" target="_blank">Grid System</a>

Any layout for smaller devices (tablets) should be added separately in the stylesheet as to not break the layout.

### Media Queries

The Following do not take effect until 800 pixels (media queries)

* Grid System
* Hover States

## Browser Support

I created this theme with IE8+ support in mind - if you need additional support, I would suggest removing the line
```scss
@include box-sizing(border-box);
```
from line 5 of scss/base.scss, as well as updating the clearfix on line 18 of scss/bits.scss to
```scss
.clearfix{

	&:before,
	&:after{
	    content: "";
	    display: table;
	} 
	&:after {
		clear: both;
	}

    zoom: 1;
}
```