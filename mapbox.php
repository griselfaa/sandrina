<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Mapbox GL JS map</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />

    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v3.12.0/mapbox-gl.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />

    <style>
      html {
        overflow-y: hidden;
        overflow-x: hidden;
      }

      body {
        overflow-y: hidden;
        overflow-x: hidden;
        margin: 0;
        padding: 0;
      }

      #container {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
      }

      #list {
        width: 25%;
        height: 100%;
        align-self: start;
      }

      #map {
        width: 75%;
        height: 100%;
        align-self: end;
      }

      .marker {
        background-image: url(data:image/png;base64,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);
        background-size: cover;
        width: 25px;
        height: 25px;
        cursor: pointer;
        filter: grayscale(100%);
      }

      .marker.active {
        filter: hue-rotate(180deg);
        width: 35px;
        height: 35px;
        z-index: 1000;
      }

      .list-group-item {
        border: none;
        padding: 20px;
      }

      .list-group-item-text {
        margin-top: 10px;
      }

      .list-group-item-text .fa {
        font-weight: bold;
        font-size: 15px;
      }

      .list-group-item-text.address {
        color: #828282;
      }

      #list-scroll {
        overflow-y: scroll;
        height: 90%;
      }

      #list-search {
        margin-bottom: 10px;
      }

      .search {
        margin-top: 10px;
        border: none;
      }

      .search .input-group-addon {
        background-color: inherit;
      }

      .search .input-group .form-control {
        box-shadow: none;
      }

      .list-group-item.active,
      .list-group-item.active:focus,
      .list-group-item.active:hover {
        color: inherit !important;
        background-color: #2385804f;
        border: 2px solid #24837b;
      }

      .list-group-item.active .list-group-item-text {
        color: inherit !important;
      }

      .list-group-item.active .list-group-item-text.address {
        color: #828282 !important;
      }

      @media only screen and (max-width: 1300px) {
        #list {
          width: 35%;
        }

        #map {
          width: 65%;
        }
      }

      @media only screen and (max-width: 767px) {
        body {
          font-size: 12px;
        }

        #list {
          width: 50%;
        }

        #map {
          width: 50%;
        }
      }
    </style>
  </head>
  <body>
    <div id="container">
      <div id="list">
        <div id="list-search" class="list-group"></div>
        <div id="list-scroll" class="list-group"></div>
      </div>
      <div id="map"></div>
    </div>

    <script src="https://api.mapbox.com/mapbox-gl-js/v3.12.0/mapbox-gl.js"></script>
    <script>
      const list = document.getElementById("list-scroll");
      const search = document.getElementById("list-search");
      let markers = [];

      const ubicaciones = [
        { id: 1, name: "Jetour - Soueast Aguascalientes", address: "Av. Independencia 1810, Col. Jardines De La Concepción Ii, Ags. Cp: 20120", region: "Aguascalientes", country: "Mexico", phone: 4921052352, email: "felipe.escalera@ismomotors.com", latitude: 21.9205322, longitude: -102.3029914 },
        { id: 2, name: "Jetour - Soueast Mexicali", address: "Boulevard Lázaro Cárdenas 1598, Ex Ejido Zacatecas C.P.21090, Mexicali Baja California", region: "Baja California Norte", country: "Mexico", phone: 6861979141, email: "mrobledo@autoproductos.com.mx", latitude: 32.6241388, longitude: -115.4601344 },
        { id: 3, name: "Jetour - Soueast Tuxtla", address: "Boulevard Belisario Domínguez no.2285, Colonia Penipak, 29060, Tuxtla Gutiérrez", region: "Chiapas", country: "Mexico", phone: 9622910035, email: "jamzin.sumuano@grumar.mx", latitude: 16.7538804, longitude: -93.1381743 },
        { id: 4, name: "Jetour - Soueast Chihuahua", address: "Plaza HIGHSQ, Haciendas del Valle II Etapa, 31217 Chihuahua, Chih.", region: "Chihuahua", country: "Mexico", phone: 6146063184, email: "supervisobdc@jetourchihuahua.com.mx", latitude: 28.6376823, longitude: -106.1226578 },
        { id: 5, name: "Jetour - Soueast Naucalpan", address: "Blvd Manuel Avila Camacho 520, Col Industrial Atoto, Naucalpan de Juarez, C.P. 53519", region: "CDMX y Zona Metropolitana", country: "Mexico", phone: 5640006637, email: "gtegeneral@jetournaucalpan.com.mx", latitude: 19.4702286, longitude: -99.2273496 },
        { id: 6, name: "Jetour - Soueast Interlomas", address: "Vía Magna Manzana 3 Lote 16, Bosque de la Herradura, 52783 Naucalpan de Juárez, Méx.", region: "Estado de México", country: "Mexico", phone: 5593313404, email: "clientesjetourinterlomas@etcmotors.com.mx", latitude: 19.4024551, longitude: -99.2743617 },
        { id: 7, name: "Jetour - Soueast Esmeralda", address: "LT 2A, Av. Adolfo Ruiz Cortines Manzana 1 Section-Lot 26-PB, Lomas de Atizapan, 52977 Cdad. López Mateos, Méx.", region: "CDMX y Zona Metropolitana", country: "Mexico", phone: 5565027249, email: "amendoza@jetmotors.mx", latitude: 19.5532035, longitude: -99.2669871 },
        { id: 8, name: "Jetour - Soueast Metepec", address: "Blvd. Solidaridad las Torres 401-local A, San Carlos, 52159 San Francisco Coaxusco, Méx", region: "Estado de México", country: "Mexico", phone: 7223677996, email: "Jet.ventas@grupotolllocan.com", latitude: 19.2748379, longitude: -99.612802 },
        { id: 9, name: "Jetour - Soueast  Irapuato", address: "Plaza Zyriane, Blvd. A villas 2662, Irapuato, Gto.", region: "Guanajuato", country: "Mexico", phone: "446 138 4447", email: "gmarketing@jetouradc.com", latitude: 20.6683985, longitude: -101.3133116 },
        { id: 10, name: "Jetour - Soueast  Country", address: "Av Adolfo López Mateos Nte 485, Circunvalación Vallarta, 44680 Guadalajara, Jal.", region: "Jalisco", country: "Mexico", phone: "+5213324575495", email: "supervisorbdc@flosoljetour.com", latitude: 20.6834063, longitude: -103.381694 },
        { id: 11, name: "Jetour - Soueast  Morelia", address: "Av. Lic. Enrique Ramírez Miguel 36, Las Américas, 58270 Morelia, Mich.", region: "Michoacán", country: "Mexico", phone: 4434707150, email: "a.cruzm@citelis.mx", latitude: 19.6952136, longitude: -101.159238 },
        { id: 12, name: "Jetour - Soueast Tepic", address: "México 15 km 14, El Armadillo, 63792 Tepic, Nay.", region: "Nayarit", country: "Mexico", phone: 3314666611, email: "etamayo@flosoljetour.com, hdelrio@flosol.net", latitude: 21.4656169, longitude: -104.8617207 },
        { id: 13, name: "Jetour - Soueast Alfonso Reyes", address: "Av. Alfonso Reyes 2611, Burócratas Municipales, 64769 Monterrey, N.L.", region: "Nuevo León", country: "Mexico", phone: 8127494211, email: "carmendariz@carone.com.mx", latitude: 25.6326851, longitude: -100.3005709 },
        { id: 14, name: "Jetour - Soueast Angelópolis", address: "Av. de los Duques 16804 Tlaxcalancingo.", region: "Puebla", country: "Mexico", phone: 2226750719, email: "miguel.torres@grupohuerta.net", latitude: 19.002062, longitude: -98.2611814 },
        { id: 15, name: "Jetour - Soueast Juriquilla", address: "Blvd. Bernardo Quintana 5112, San Pablo, 76125 Santiago de Querétaro, Qro", region: "Querétaro", country: "Mexico", phone: 4461335992, email: "d.rojas@citelis.mx", latitude: 20.6199519, longitude: -100.4145037 },
        { id: 16, name: "Jetour - Soueast Corregidora", address: "Plaza Zoco, Lateral 57, Col. Cimatario, CP:76030.", region: "Querétaro", country: "Mexico", phone: "446 138 4447", email: "gmarketing@jetouradc.com", latitude: 20.5776064, longitude: -100.3870969 },
        { id: 17, name: "Jetour - Soueast Cancún", address: "Av Xcaret entre calle ónix y rubí, Cancún Quintana Roo, 77500", region: "Quintana Roo", country: "Mexico", phone: "9981319108", email: "mercadotecniacun@jetourpeninsula.com", latitude: 21.1555593, longitude: -86.8328299 },
        { id: 18, name: "Jetour - Soueast Carretera 57", address: "CARR 57 | BOULEVARD SAN LUIS #215A ESQ CALLE 53 COL. VILLA JARDIN CP 78396 SLP, SLP", region: "San Luis Potosí", country: "Mexico", phone: 4441958366, email: "bdcslp@grupotangamanga.com.mx", latitude: 22.124307, longitude: -100.9159396 },
        { id: 19, name: "Jetour - Soueast Los Mochis", address: "BLVD. ADOLFO LOPEZ MATEOS 2470 COL. MIGUEL HIDALGO C.P. 81210 AHOME LOS MOCHIS SINALOA", region: "Sinaloa", country: "Mexico", phone: 6681724214, email: "marketing.jetour@grupofica.com.mx", latitude: 25.8174792, longitude: -108.9750633 },
        { id: 20, name: "Jetour - Soueast Culiacán", address: "BLVR. PEDRO INFANTE #2301, PLAZA CONGRESO, LOCALES 13 Y 14.", region: "Sinaloa", country: "Mexico", phone: 6671519064, email: "GTE.BDC@GBAUTOMOTRIZ.MX", latitude: 24.8028362, longitude: -107.4128823 },
        { id: 21, name: "Jetour - Soueast Hermosillo", address: "Calle Garmendia No. 251 Entre San Luis Potosí y Fronteras. \nCol. San Benito CP: 83190", region: "Sonora", country: "Mexico", phone: 6621725079, email: "Kmagallanes@jetoursonora.com", latitude: 29.0964626, longitude: -110.9731774 },
        { id: 22, name: "Jetour - Soueast Ciudad Obregón", address: "MIGUEL ALEMAN #234, ENTRE GUERRERO Y NO RELECCIÓN, COLONIA CENTRO.", region: "Sonora", country: "Mexico", phone: 6442044858, email: "GTE.BDC@GBAUTOMOTRIZ.MX", latitude: 27.493115485338443, longitude: -109.93062022883637 },
        { id: 23, name: "Jetour - Soueast  Villahermosa", address: "Esq Velodromo de la, Av Juan Estrada Torres, C. Rita Estrada S/n, Primero de Mayo, 86190 Villahermosa, Tab.", region: "Tabasco", country: "Mexico", phone: 9933996937, email: "bdc.mb11@grupodg.com", latitude: 17.9786655, longitude: -92.9413537 },
        { id: 24, name: "Jetour - Soueast Mérida", address: "Av. 69 por 48 y 50, Montes de Amé, 97115 Mérida, Yuc.", region: "Yucatán", country: "Mexico", phone: 9999418600, email: "mercadotecnia@jetourpeninsula.com", latitude: 21.0307114, longitude: -89.61810179999999 },
        { id: 25, name: "Jetour - Soueast Oaxaca", address: "AV. UNIVERSIDAD 145-D, EXHACIENDA CANDIANI KM 3.8\nXOXOCOTLAN OAXACA, OAXACA", region: "Oaxaca", country: "Mexico", phone: 9622910035, email: "jamzin.sumuano@grumar.mx", latitude: 17.0365155, longitude: -96.7124054 },
      ];

      mapboxgl.accessToken = "pk.eyJ1IjoiYWFzanB2bSIsImEiOiJjbHZyZDZsMXgwbnBwMmxvMWNwY2Npa2RkIn0.548XU5BLah7z2EyLQspnPQ";
      const map = new mapboxgl.Map({
        container: "map", // container ID
        center: [-100.97916, 22.14982], // starting position [lng, lat]. Note that lat must be set between -90 and 90
        zoom: 4, // starting zoom
      });
      map.addControl(
        new mapboxgl.GeolocateControl({
          positionOptions: {
            enableHighAccuracy: true,
          },
          // When active the map will receive updates to the device's location as it changes.
          trackUserLocation: true,
          // Draw an arrow next to the location dot to indicate which direction the device is heading.
          showUserHeading: true,
        })
      );

      map.on("load", async () => {
        addSearchElement();
        addDefaultMarkers();
      });

      const addDefaultMarkers = async () => {
        await clearUbications();
        ubicaciones.forEach(function (ubicacion) {
          addListElement(list, ubicacion);
          const el = document.createElement("div");
          el.className = "marker";
          const marker = new mapboxgl.Marker(el).setLngLat([ubicacion.longitude, ubicacion.latitude]).addTo(map);
          marker.getElement().id = `marker-${ubicacion.id}`;
          marker.getElement().addEventListener("click", () => {
            goTo(document.getElementById(`store-${ubicacion.id}`));
          });
          markers.push(marker);
        });
      };

      const addSearchElement = () => {
        const div = document.createElement("div");
        div.className = "list-group-item search";
        div.innerHTML = `
        <div class="input-group">
          <input type="text" id="search" class="form-control" placeholder="Código postal / Ciudad / Dirección" aria-describedby="basic-addon2">
          <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
        `;
        search.append(div);

        const imput = document.getElementById("search");
        imput.addEventListener("input", function (evt) {
          filter(this.value);
        });
      };

      const addListElement = (list, ubicacion) => {
        const a = document.createElement("a");
        a.className = "list-group-item";
        a.id = `store-${ubicacion.id}`;
        a.dataset.longitude = ubicacion.longitude;
        a.dataset.latitude = ubicacion.latitude;
        a.addEventListener("click", function (evt) {
          goTo(this);
        });

        const h4 = document.createElement("h4");
        h4.className = "list-group-item-heading";
        h4.appendChild(document.createTextNode(ubicacion.name));
        a.append(h4);

        const p1 = document.createElement("p");
        p1.className = "list-group-item-text address";
        p1.innerHTML = ubicacion.address + ", " + ubicacion.region + ", " + ubicacion.country;
        a.append(p1);

        const p2 = document.createElement("p");
        p2.className = "list-group-item-text";
        p2.innerHTML = '<i class="fa fa-phone" aria-hidden="true" /></i>&nbsp;&nbsp;' + formatPhoneNumber(ubicacion.phone);
        a.append(p2);

        const p3 = document.createElement("p");
        p3.className = "list-group-item-text";
        p3.innerHTML = '<i class="fa fa-envelope-o" aria-hidden="true" /></i>&nbsp;&nbsp;' + ubicacion.email;
        a.append(p3);

        list.append(a);
      };

      const formatPhoneNumber = (phoneNumberString) => {
        var cleaned = ("" + phoneNumberString).replace(/\D/g, "");
        var match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);
        if (match) {
          return "(" + match[1] + ") " + match[2] + "-" + match[3];
        }
        return phoneNumberString;
      };

      const filter = async (text) => {
        if (text && text.length > 3) {
          let filtered = ubicaciones.filter((entry) => includesCaseInsensitive(entry.name, text) || includesCaseInsensitive(`${entry.address}, ${entry.region}, ${entry.country}`, text));
          await clearUbications();
          filtered.forEach(function (ubicacion) {
            const el = document.createElement("div");
            el.className = "marker";
            markers.push(new mapboxgl.Marker(el).setLngLat([ubicacion.longitude, ubicacion.latitude]).addTo(map));
            addListElement(list, ubicacion);
          });
        } else if (!text) {
          console.log("addDefaultMarkers...");
          addDefaultMarkers();
        }
      };

      const clearUbications = async () => {
        list.innerHTML = "";
        await markers.forEach((marker) => marker.remove());
        markers = [];
      };

      const goTo = (that) => {
        if (that.className.includes("active")) {
          that.className = `list-group-item`;
        } else {
          const active = document.querySelector(".list-group-item.active");
          if (active) active.className = `list-group-item`;
          that.className = `list-group-item active`;
        }

        const marker = document.getElementById(`marker-${that.id.split("-")[1]}`);
        if (marker && marker?.className.includes("active")) {
          marker.className = `marker mapboxgl-marker mapboxgl-marker-anchor-center`;
        } else {
          const active = document.querySelector(".marker.active");
          if (active) active.className = `marker mapboxgl-marker mapboxgl-marker-anchor-center`;
          if (marker) marker.className = `marker mapboxgl-marker mapboxgl-marker-anchor-center active`;
        }

        map.flyTo({ center: [that.dataset.longitude, that.dataset.latitude], essential: true, zoom: 15, duration: 4000 });
        that.scrollIntoView();
      };

      const includesCaseInsensitive = (str, searchString) => new RegExp(searchString, "i").test(str);
    </script>
  </body>
</html>
