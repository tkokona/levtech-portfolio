// // googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成
// function initMap() {
//     // welcome.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
//     map = document.getElementById("map");
//     //↓東京駅の緯度と経度
//     let tokyoStation = {lat: 35.681236, lng: 139.767125};
//     // オプションを設定
//     opt = {
//         zoom: 13, //地図の縮尺を指定
//         center: tokyoStation, //センターを東京駅に指定
//     };
//     // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
//     mapObj = new google.maps.Map(map, opt);
//     marker = new google.maps.Marker({
//         // ピンを差す位置を東京駅に設定
//         position: tokyoStation,

//         // ピンを差すマップを指定
//         map: mapObj,

//         // ホバーしたときに「tokyotower」と表示されるように指定
//         title: 'tokyostation',
//     });
// }


// function initMap() {
//   const directionsService = new google.maps.DirectionsService();
//   const directionsRenderer = new google.maps.DirectionsRenderer();
//   const map = new google.maps.Map(document.getElementById("map"), {
//     zoom: 7,
//     center: { lat: 41.85, lng: -87.65 },
//   });

//   directionsRenderer.setMap(map);

//   const onChangeHandler = function () {
//     calculateAndDisplayRoute(directionsService, directionsRenderer);
//   };

//イベントリスナーは、特定のイベント（例: ボタンのクリック、要素の変更、キーの入力など）が発生した際に実行される関数
//HTML文書内でidが "start" という要素を持つものを探し、その要素に変化（change）があった時に "onChangeHandler" という関数を呼び出すイベントリスナーを設定
//   document.getElementById("start").addEventListener("change", onChangeHandler);
//   document.getElementById("end").addEventListener("change", onChangeHandler);
// }

// function calculateAndDisplayRoute(directionsService, directionsRenderer) {
//   directionsService
//     .route({
//       origin: {
//         query: document.getElementById("start").value,
//       },
//       destination: {
//         query: document.getElementById("end").value,
//       },
//       travelMode: google.maps.TravelMode.DRIVING,
//     })
//     .then((response) => {
//       directionsRenderer.setDirections(response);
//     })
//     .catch((e) => window.alert("Directions request failed due to " + status));
// }

// window.initMap = initMap;

// googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成

// function initMap() {
  
//   const directionsService = new google.maps.DirectionsService();
//   const directionsRenderer = new google.maps.DirectionsRenderer();
  
//   let tokyoStation = {lat: 35.681236, lng: 139.767125};
//   const map = new google.maps.Map(document.getElementById("map"), {
//     center: tokyoStation, //センターを東京駅に指定
//     zoom: 13,
//     mapTypeControl: false,
//   });
  
//   directionsRenderer.setMap(map);
//   const onChangeHandler = function () {
//     calculateAndDisplayRoute(directionsService, directionsRenderer);
//   };
  
  
//   const card = document.getElementById("pac-card"); //bladeファイルの中のidがpac-cardのものをcardという変数に代入する
//   // const input = document.getElementById("pac-input"); //bladeファイルの中のidがpac-inputのものをinputという変数に代入する
//   const start = document.getElementById("start");
//   const end = document.getElementById("end");
//   const options = {
//     fields: ["formatted_address", "geometry", "name"], //検索結果に含める情報の種類を指定します。この場合は、formatted_address（フォーマットされた住所）、geometry（地理情報）、name（名前）が含まれるようになります。
//     strictBounds: false, //厳密な境界設定の有無を指定します。falseに設定されているため、検索結果が厳密な境界に制限されません。
//     // types: ["establishment"],  //検索の対象となる場所の種類を指定します。この場合は、establishment（施設）というタイプの場所が対象となります。
//   };

//   map.controls[google.maps.ControlPosition.TOP_LEFT].push(card); //検索ボックスなどを左上に配置

//   const start_autocomplete = new google.maps.places.Autocomplete(start, options); //候補地を表示するためのクラス。引数のinputとoptionsは上で記述した変数
//   const end_autocomplete = new google.maps.places.Autocomplete(end, options);

//   //描画されてる地図の範囲内の結果を優先させるための記述。
//   autocomplete.bindTo("bounds", map);

//   const infowindow = new google.maps.InfoWindow();
//   const infowindowContent = document.getElementById("infowindow-content"); //ドキュメント内でidが "infowindow-content" という要素を取得しています。これは情報ウィンドウに表示するコンテンツを保持する要素
//   infowindow.setContent(infowindowContent);

// }
// function calculateAndDisplayRoute(directionsService, directionsRenderer) {
//   directionsService
//     .route({
//       origin: {
//         query: document.getElementById("start").value,
//       },
//       destination: {
//         query: document.getElementById("end").value,
//       },
//       travelMode: google.maps.TravelMode.DRIVING,
//     })
//     .then((response) => {
//       directionsRenderer.setDirections(response);
//     })
//     .catch((e) => window.alert("Directions request failed due to " + status));
// }
// window.initMap = initMap;

function initMap() {
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();
  let tokyoStation = {lat: 35.681236, lng: 139.767125};
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 13,
    center: tokyoStation,
  });

  directionsRenderer.setMap(map);

  const onChangeHandler = function () {
    calculateAndDisplayRoute(directionsService, directionsRenderer);
  };

  document.getElementById("start").addEventListener("change", onChangeHandler);
  document.getElementById("end").addEventListener("change", onChangeHandler);
  
  const startInput = document.getElementById( 'start' );
  const endInput = document.getElementById('end');
  const options = {
    fields: ["formatted_address", "geometry", "name"],
    strictBounds: false,
  };
  const startautocomplete = new google.maps.places.Autocomplete( startInput, options);
  const endAutocomplete = new google.maps.places.Autocomplete(endInput, options);
  
  const infowindow = new google.maps.InfoWindow();
  const infowindowContent = document.getElementById("infowindow-content");
  infowindow.setContent(infowindowContent);
}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
  directionsService
    .route({
      origin: {
        query: document.getElementById("start").value,
      },
      destination: {
        query: document.getElementById("end").value,
      },
      travelMode: google.maps.TravelMode.DRIVING,
    })
    .then((response) => {
      directionsRenderer.setDirections(response);
    })
    .catch((e) => window.alert("Directions request failed due to " + e));
}

window.initMap = initMap;