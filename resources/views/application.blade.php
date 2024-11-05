<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="{{ asset('Y.ico') }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AI - by YogaDev</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('loader.css') }}" />
  @vite(['resources/js/main.js'])
</head>

<body>
  <div id="app">
    <div id="loading-bg">
	  <div class="loading-logo">
		<svg version="1.1" viewBox="0 0 1600 1600" width="100" height="80" xmlns="http://www.w3.org/2000/svg">
			<path transform="translate(148,148)" d="m0 0h71l10 13 16 21 14 19 16 21 14 19 16 21 14 19 13 17 9 12 16 21 14 19 10 13 33 44 16 21 14 19 16 21 14 19 16 21 21 28 16 21 14 19 16 21 14 19 16 21 10 14 32 42 14 19 16 21 14 19 16 21 14 19 10 13v341h19v94h-94v-94l18-1v-321l-16-21-14-19-16-21-14-19-16-21-21-28-16-21-14-19-13-17-21-28-16-21-14-19-16-21-14-19-16-21-33-44-16-21-14-19-16-21-14-19-16-21-12-16-8-11-16-21-14-19-16-21-14-19-16-21-9-12-1 1172h1173v-415h-19v-95h94v95h-19v471h-1285z" fill="#1BE1BC"/>
			<path transform="translate(410,148)" d="m0 0h1023v442h19v95h-94v-95h19v-386l-854 1 16 21 14 19 16 21 14 19 13 17 9 12 16 21 14 19 16 21 14 19 16 21 24 32 16 21 14 19 16 21 14 19 16 21 6 8v2h2l2-4 14-19 16-21 14-19 16-21 14-19 14-18 8-11 16-21 14-19 16-21 10-14h329l-7 11-14 18-14 19-8 10-16 21-14 19-16 21-14 19-16 21-14 19-10 13-9 12-16 21-14 19-16 21-14 19-16 21-24 32-16 21-14 19-16 21-14 19-16 21-14 19-10 13-3 4-1 322h19v94h-94v-94h19l-1-339 21-28 16-21 14-19 16-21 14-19 16-21 14-19 10-13 16-21 14-19 16-21 14-19 16-21 14-19 10-13 9-12 16-21 14-19 16-21 14-19 10-14h-188l-2 4-14 19-16 21-14 19-10 13-15 20-16 21-14 19-16 21-14 19-16 21-14 19-16 21-5 7-3-1-14-19-16-21-14-19-16-21-14-19-16-21-14-19-16-21-14-19-14-18-14-19-16-21-14-19-16-21-14-19-10-13-15-20-16-21-14-19-16-21-14-19-16-21-12-16-6-7-9-13-16-21-9-12z" fill="#FE9403"/>
			<path transform="translate(148,148)" d="m0 0h71l10 13 16 21 14 19 16 21 14 19 16 21 14 19 13 17 9 12 16 21 14 19 10 13 33 44 16 21 14 19 16 21 14 19 16 21 21 28 16 21 14 19 16 21 14 19 16 21 10 14 32 42 14 19 16 21 14 19 16 21 14 19 10 13v341h19v94h-94v-94l18-1v-321l-16-21-14-19-16-21-14-19-16-21-21-28-16-21-14-19-13-17-21-28-16-21-14-19-16-21-14-19-16-21-33-44-16-21-14-19-16-21-14-19-16-21-12-16-8-11-16-21-14-19-16-21-14-19-16-21-9-12-1 580-2 3-7-1-26-13-17-9v-2h-2l-2-5z" fill="#1A87D7"/>
			<path transform="translate(410,148)" d="m0 0h1023v442h19v95h-94v-95h19v-386l-854 1 16 21 14 19 16 21 14 19 13 17 9 12 16 21 14 19 9 12-2 1-11-4-36-18-19-10-32-16-9-3-14-19-16-21-14-19-16-21-14-19-10-13-6-7-9-13-16-21-9-12z" fill="#FE9403"/>
			<path transform="translate(1037,570)" d="m0 0 5 1 46 23-1 4-16 21-14 19-16 21-21 28-16 21-14 19-16 21-14 19-16 21-14 19-10 13-3 4-1 322h19v94h-94v-94h19l-1-339 21-28 16-21 14-19 16-21 14-19 16-21 14-19 10-13 16-21 14-19 16-21z" fill="#C205F0"/>
			<path transform="translate(1358,886)" d="m0 0h94v95h-19v471h-1v-21l-5 1-58-29-3-5 5-2h6v-415h-19z" fill="#1A6CE0"/>
			<path transform="translate(638,795)" d="m0 0 5 2 38 20 21 10 3 2h4l3 8 1 66v243h19v94h-94v-94l18-1v-321l-16-21-2-5z" fill="#1A87D7"/>
			<path transform="translate(536,316)" d="m0 0 7 1 19 10 32 16 19 10 22 11 10 3 14 19 16 21 14 19 10 13 12 16 16 21 14 19 16 21 14 19 16 21v2h2l2-4 14-19 16-21 14-19 15-20 6 1 19 10 24 12 2 4-14 18-14 19-16 21-14 19-16 21-14 19-16 21-8 11-3-1-14-19-16-21-14-19-16-21-14-19-16-21-14-19-16-21-14-19-14-18-14-19-16-21-14-19-16-21-14-19-10-13-15-20z" fill="#D235B9"/>
			<path transform="translate(389,468)" d="m0 0 5 2 12 5 40 20 19 10 21 10 9 6v-3l4 2 12 16 16 21 14 19 16 21 14 19 16 21 10 14 32 42 14 19 16 21 14 19 16 21 14 19 10 13v98h-1l-1-66-3-7-5-1-19-10-40-20-5-3-1 3-4-4-14-19-16-21-14-19-16-21-27-36-16-21-14-19-10-13-12-16-16-21-14-19-16-21-14-19-16-21-24-32z" fill="#1A6CE0"/>
			<path transform="translate(410,148)" d="m0 0h160l3 5 20 10 19 10 52 26 9 4v1l-150 1 16 21 14 19 16 21 14 19 13 17 9 12 16 21 14 19 9 12-2 1-11-4-36-18-19-10-32-16-9-3-14-19-16-21-14-19-16-21-14-19-10-13-6-7-9-13-16-21-9-12z" fill="#F27B32"/>
			<path transform="translate(148,531)" d="m0 0h1l1 12 4 6 44 22 5-1v-13h1v247l-2 3-7-1-26-13-17-9v-2h-2l-2-5z" fill="#1A88D7"/>
			<path transform="translate(1377,1171)" d="m0 0 2 2h3l20 10 19 10 9 4 2 6 1 67v182h-1v-21l-5 1-58-29-3-5 5-2h6z" fill="#1A88D7"/>
			<path transform="translate(1140,1396)" d="m0 0h231l-4 3 4 4 52 26 6 2h3v21h-188l-6-1v-1l-13-4-19-10-30-15-38-20-1-4z" fill="#1AB9C7"/>
			<path transform="translate(861,1082)" d="m0 0 6 1 35 18 12 6 2 3v36h19v94h-94v-94h19v-63z" fill="#FF0091"/>
			<path transform="translate(152,347)" d="m0 0 4 1 44 22 3 5 1 11v171l-1 13-5 2-44-22-5-7-1-12v-170l1-12z" fill="#1A6CE0"/>
			<path transform="translate(943,352)" d="m0 0h21l6 2 8 5 32 16 19 10 34 17 4 4-1 1h-95l-2 4-14 19-16 21-14 19-10 13-13 17-5-2-46-23 4-7 14-18 27-36 16-21 14-19 16-21z" fill="#F27B32"/>
			<path transform="translate(954,1396)" d="m0 0h186v1l5 1v1h-7l3 3 20 10 19 10 50 25 13 2 1 3h-186l4-2-12-5-19-10-15-8-21-10-19-10-9-5-3-3v-2h-10z" fill="#1ACEC1"/>
			<path transform="translate(1358,886)" d="m0 0h94v95h-19v289h-1v-289h-74z" fill="#2B7DF6"/>
			<path transform="translate(1136,439)" d="m0 0 15 8 34 17-1 5-16 21-14 19-16 21-18 24-16 21-14 19-2 1-46-23-4-3 14-19 16-21 21-28 16-21 14-19 16-21z" fill="#F27B32"/>
			<path transform="translate(712,1142)" d="m0 0 1 4h19v94h-94v-94l18-1 2-2v2h54z" fill="#1AE0BC"/>
			<path transform="translate(454,207)" d="m0 0h6l29 15 38 19 19 10 8 4 9 3 14 19 16 21 12 16 16 21 14 19 9 12-2 1-11-4-36-18-19-10-32-16-9-3-14-19-16-21-14-19-16-21-14-19-7-9z" fill="#FE9403"/>
			<path transform="translate(148,777)" d="m0 0 2 3v2h2v2l6 2 23 12 16 8h5l2-2v117l-2 2-7-1-42-21-5-7z" fill="#1AB9C7"/>
			<path transform="translate(689,518)" d="m0 0h5l19 10 20 10 19 10 32 16 19 10 28 14 2 4-14 19-16 21-14 19-3-1-14-19-16-21-14-19-16-21-14-19-16-21-7-10z" fill="#CD29CD"/>
			<path transform="translate(1037,570)" d="m0 0 5 1 46 23-1 4-16 21-14 19-16 21-9 12-11 15-3-1v-2l-6-2-42-21 6-9 14-18 14-19 16-21 14-19z" fill="#D235B9"/>
			<path transform="translate(536,316)" d="m0 0 7 1 19 10 32 16 19 10 22 11 10 3 14 19 16 21 14 19 10 13 4 6-1 2-12-5-40-20-19-10-28-14-9-4-16-21-14-19-10-13-15-20z" fill="#FDFDFC"/>
			<path transform="translate(657,1033)" d="m0 0h1l1 7 2 1v2l6 2 32 16 7 4h6v80h-54l-1-2z" fill="#1AB9C7"/>
			<path transform="translate(148,894)" d="m0 0h3l2 6 44 22 4 1 1-3 2 1v95h-1v-5h-6l-32-16-12-7-3-3-2 3z" fill="#1ACEC1"/>
			<path transform="translate(596,395)" d="m0 0 6 1 19 10 17 9 58 29 9 3 16 21 14 19 15 20-2 2-16-8-23-12-62-31-4 1-14-18-14-19-16-21-3-4z" fill="#D741A4"/>
			<path transform="translate(496,148)" d="m0 0h74l3 5 20 10 19 10 52 26 9 4v1h-71l-10-1-4-4-19-9-19-10-32-16-19-10-6-2v-3z" fill="#F9881A"/>
			<path transform="translate(1293,1396)" d="m0 0h78l-4 3 4 4 52 26 6 2h3v21h-36l-14-5-44-22-19-10-26-13-1-4z" fill="#1AABCD"/>
			<path transform="translate(943,352)" d="m0 0h21l6 2 8 5 32 16 19 10 34 17 4 4-1 1h-80l3-1-2-4-44-22-9-5-6-2 2-4 12-16z" fill="#F8871A"/>
			<path transform="translate(1075,519)" d="m0 0 1 2 5 2 42 21 2 4-12 15-14 19-10 13-12-5-23-12-16-8 4-7 14-18 14-19z" fill="#FE9403"/>
			<path transform="translate(888,425)" d="m0 0 48 24 2 4-14 18-12 16-10 13-5-2-46-23 4-7 14-18 12-16z" fill="#FE9403"/>
			<path transform="translate(969,660)" d="m0 0 8 2 19 10 22 11v2h2l-2 5-14 18-14 19-3 3-6-1-39-20-6-4 6-9 14-18z" fill="#CD29CD"/>
			<path transform="translate(860,1027)" d="m0 0h6l19 10 16 8 13 7 2 3v55l-5-4-23-11-23-12h-5z" fill="#FEFFFE"/>
			<path transform="translate(850,475)" d="m0 0 6 1 19 10 24 12 2 4-14 18-11 15-9-3-38-19-4-3 2-4 14-19z" fill="#FDFEFD"/>
			<path transform="translate(1037,570)" d="m0 0 5 1 46 23-1 4-16 21-8 11-5-1-42-21-4-3 2-4 14-19z" fill="#FDFDFC"/>
			<path transform="translate(148,777)" d="m0 0 2 3v2h2v2l6 2 23 12 16 8h5l2-2v40l-7 1-19-10-24-12-6-6z" fill="#1AABCD"/>
			<path transform="translate(657,1033)" d="m0 0h1l1 7 2 1v2l6 2 32 16 7 4h6v37l-1 1h-6l-17-9-19-9-9-6-3-5z" fill="#1AABCD"/>
			<path transform="translate(1136,439)" d="m0 0 15 8 34 17-1 5-16 21-2 3-4-1-8-5-30-15-9-4 2-4 14-19z" fill="#F88819"/>
			<path transform="translate(1011,605)" d="m0 0 4 1 19 10 28 14-4 7-14 18-4 4-2-4-5-1-23-12-14-7-5-2 2-4 14-19z" fill="#D740A4"/>
			<path transform="translate(824,510)" d="m0 0 4 1 19 10 28 14-4 7-14 18-3 3h-2l-1-2-42-21-4-1-1-3 14-18z" fill="#D741A4"/>
			<path transform="translate(437,183)" d="m0 0h6l22 11 19 10 46 23 8 5 7 2 14 19 2 5-11-4-22-11-19-10-36-18-13-7-7-2-7-7-7-11z" fill="#F27B32"/>
			<path transform="translate(423,162)" d="m0 0 5 1 42 21 19 10 32 16 9 4 14 19v1h-5l-3-3-62-31-19-10-13-6h-6l-14-19z" fill="#FD9303"/>
			<path transform="translate(895,415)" d="m0 0 8 2 40 20 3 3-2 5-5 6-5-2-42-21-3-2 1-4z" fill="#F27B32"/>
			<path transform="translate(1082,510)" d="m0 0 8 2 40 20 3 3-2 5-5 6-5-2-40-20-5-3 1-4z" fill="#F27B32"/>
			<path transform="translate(1378,563)" d="m0 0 7 3 40 20 2 2 4 2h-54v-26z" fill="#F9881A"/>
			<path transform="translate(902,406)" d="m0 0h5l19 10 26 13 1 4-6 8-4-2v-2l-6-2-36-18-5-2z" fill="#FD9303"/>
			<path transform="translate(1091,501)" d="m0 0 4 1 42 21 3 3-2 4-4 6-4-2v-2l-6-2-36-18-5-2 5-8z" fill="#FD9303"/>
			<path transform="translate(176,148)" d="m0 0h43l10 13 13 17-1 2-4-4-11-6-34-17-7-3-9-1z" fill="#1AABCC"/>
			<path transform="translate(765,619)" d="m0 0 6 2 23 12 5 2-1 4-9 12-3-1-14-19-7-9z" fill="#C308EE"/>
			<path transform="translate(1405,981)" d="m0 0h27v10l-2 5-5-2-19-10z" fill="#1A88D7"/>
			</svg>
		</div>
      <div class="loading">
        <div class="effect-1 effects"></div>
        <div class="effect-2 effects"></div>
        <div class="effect-3 effects"></div>
      </div>

	  <div class="d-flex justify-content-center">
		<p style="font-weight: bold">Yoga Dev</p>
	  </div>
    </div>
  </div>
  
  <script>
    const loaderColor = localStorage.getItem('sneat-initial-loader-bg') || '#FFFFFF'
    const primaryColor = localStorage.getItem('sneat-initial-loader-color') || '#696CFF'

    if (loaderColor)
      document.documentElement.style.setProperty('--initial-loader-bg', loaderColor)

    if (primaryColor)
      document.documentElement.style.setProperty('--initial-loader-color', primaryColor)
  </script>
</body>

</html>
