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



let deferredPrompt
if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register('../firebase-messaging-sw.js')
      .then(function(reg){
        console.log("Yes, it did firebase messaging sw.")
        ;
      }).catch(function(err) {
        console.log("No it didn't. This happened: ", err)
      });
  }

console.log(deferredPrompt)
window.addEventListener('beforeinstallprompt',function(event){
    console.log('beforeInstallPrompt fired');
    event.preventDefault();
    deferredPrompt =  event ;
    return false
})