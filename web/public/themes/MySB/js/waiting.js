/*
   Replacing Submit Button with 'Loading' Image
   Version 2.0
   December 18, 2012

   Will Bontrager Software, LLC
   http://www.willmaster.com/
   Copyright 2012 Will Bontrager Software, LLC

   This software is provided "AS IS," without 
   any warranty of any kind, without even any 
   implied warranty such as merchantability 
   or fitness for a particular purpose.
   Will Bontrager Software, LLC grants 
   you a royalty free license to use or 
   modify this software provided this 
   notice appears on all copies. 
*/
function ButtonClicked(origin)
{
	switch (origin) {
		case 'config':
			ElementButton = "ApplyConfigButton";
			ElementReplace = "ApplyConfigButtonReplace";
			break;
		case 'page':
			ElementButton = "PageSubmitButton";
			ElementReplace = "PageButtonReplace";
			break;
	}
   document.getElementById(ElementButton).style.display = "none"; // to undisplay
   document.getElementById(ElementReplace).style.display = ""; // to display
   return true;
}
var FirstLoading = true;
function RestoreSubmitButton(origin)
{
	switch (origin) {
		case 'config':
			ElementButton = "ApplyConfigButton";
			ElementReplace = "ApplyConfigButtonReplace";
			break;
		case 'page':
			ElementButton = "PageSubmitButton";
			ElementReplace = "PageButtonReplace";
			break;
	}

   if( FirstLoading )
   {
      FirstLoading = false;
      return;
   }
   document.getElementById(ElementButton).style.display = ""; // to display
   document.getElementById(ElementReplace).style.display = "none"; // to undisplay
}
// To disable restoring submit button, disable or delete next line.
document.onfocus = RestoreSubmitButton;