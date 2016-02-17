// infinitescroll() is called on the element that surrounds 
// the items you will be loading more of
  $('#content').infinitescroll({
 
    navSelector  : "insta-container",            
                   // selector for the paged navigation (it will be hidden)
    nextSelector : "insta-container a:first",    
                   // selector for the NEXT link (to page 2)
    itemSelector : "#insta-container a .insta-img"          
                   // selector for all items you'll retrieve
				     loadingText  : "Loading new posts...",      
                 // text accompanying loading image
                 // default: "<em>Loading the next set of posts...</em>"
 
  animate      : true,      
                 // boolean, if the page will do an animated scroll when new content loads
                 // default: false
 
  extraScrollPx: 50,      
                 // number of additonal pixels that the page will scroll 
                 // (in addition to the height of the loading div)
                 // animate must be true for this to matter
                 // default: 150
 
  donetext     : "I think we've hit the end, Jim" ,
                 // text displayed when all items have been retrieved
                 // default: "<em>Congratulations, you've reached the end of the internet.</em>"
 
  bufferPx     : 40,
                 // increase this number if you want infscroll to fire quicker
                 // (a high number means a user will not see the loading message)
                 // new in 1.2
                 // default: 40
  });

