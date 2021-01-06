importScripts('https://www.gstatic.com/firebasejs/7.2.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.2.1/firebase-messaging.js');
// For an optimal experience using Cloud Messaging, also add the Firebase SDK for Analytics. 
importScripts('https://www.gstatic.com/firebasejs/7.2.1/firebase-analytics.js');


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

// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
firebase.initializeApp({
  'messagingSenderId':  "BOGkHZhVVxt7dwG_Ma8bBRdkFnMMY7NHdZpe7n800HUsLaf6i7EJGmrDk5C9pYVdCa6eTsVG-cwZAFK6GZsJAJk"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = 'Background Message Title';
  const notificationOptions = {
    body: 'Background Message body.',
    icon: '/itwonders-web-logo.png'
  };

  let titleR = payload.notification.title;
  let optionsR = {
      body : payload.notification.body,
      
  }
  new Notification(titleR,optionsR)

  return self.registration.showNotification(notificationTitle,
      notificationOptions);
});
