self.addEventListener('install',function(event){
    console.log('[serviceWorker] installing service Worker....',event)
  })
  
  self.addEventListener('activate',function(event){
    console.log('[serviceWorker] activate service Worker....',event)
  })
  self.addEventListener('fetch',function(event){
    console.log('[serviceWorker] fetch service Worker....',event)
    event.respondWith(fetch(event.request))
  })
  