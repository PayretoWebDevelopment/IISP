<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-layout module_name="Dashboard">
    <title>Payreto | User Dashboard</title>
    <h1 class="font-bold text-gray-700">Dashboard</h1>
    @auth
    @endauth
    <section class="container">
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                href="#">
                <div class="p-5">
                    <div class="flex justify-between">
                        <svg height="32px" width="32px" version="1.1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path style="fill:#FFBAA8;"
                                    d="M382.398,122.923h-6.948c-21.99,0-39.816-17.826-39.816-39.816V50.505 c0-21.989,17.826-39.816,39.816-39.816h6.948c21.99,0,39.816,17.827,39.816,39.816v32.601 C422.214,105.097,404.388,122.923,382.398,122.923z">
                                </path>
                                <path style="fill:#ECF0F1;"
                                    d="M306.124,315.324c-15.875,0-28.745-12.801-28.745-28.593V182.514l19.775-59.591h123.409 c33.085,0,59.906,26.68,59.906,59.591v104.217c0,15.792-12.869,28.593-28.745,28.593H306.124z">
                                </path>
                                <path style="fill:#FFCF70;"
                                    d="M440.385,218.589v257.782c0,13.774-11.167,24.94-24.941,24.94h-11.579 c-13.775,0-24.94-11.167-24.94-24.94V359.148v-0.267v117.49c0,13.775-11.167,24.94-24.941,24.94h-11.579 c-13.776,0-24.943-11.167-24.943-24.94V218.589H440.385z">
                                </path>
                                <polygon style="fill:#ECF0F1;"
                                    points="440.385,218.592 440.385,283.527 378.913,314.792 317.462,283.677 317.462,218.592 ">
                                </polygon>
                                <path style="fill:#FFBAA8;"
                                    d="M129.604,122.923h6.948c21.99,0,39.816-17.826,39.816-39.816V50.505 c0-21.989-17.826-39.816-39.816-39.816h-6.948c-21.99,0-39.816,17.827-39.816,39.816v32.601 C89.788,105.097,107.614,122.923,129.604,122.923z">
                                </path>
                                <path style="fill:#ECF0F1;"
                                    d="M205.878,315.324c15.875,0,28.745-12.801,28.745-28.593V182.514l-19.775-59.591H91.44 c-33.085,0-59.906,26.68-59.906,59.591v104.217c0,15.792,12.869,28.593,28.745,28.593H205.878z">
                                </path>
                                <path style="fill:#FFCF70;"
                                    d="M71.617,218.589v257.782c0,13.774,11.167,24.94,24.94,24.94h11.579 c13.775,0,24.94-11.167,24.94-24.94V359.148v-0.267v117.49c0,13.775,11.167,24.94,24.94,24.94h11.579 c13.776,0,24.943-11.167,24.943-24.94V218.589H71.617z">
                                </path>
                                <polygon style="fill:#ECF0F1;"
                                    points="71.617,218.592 71.617,283.527 133.089,314.792 194.54,283.677 194.54,218.592 ">
                                </polygon>
                                <path style="fill:#0BBBDA;"
                                    d="M183.201,315.324c-15.875,0-28.745-12.801-28.745-28.593V182.514 c0-32.911,26.821-59.591,59.906-59.591h83.277c33.085,0,59.906,26.68,59.906,59.591v104.217c0,15.792-12.869,28.593-28.745,28.593 H183.201z">
                                </path>
                                <path style="fill:#FFCF70;"
                                    d="M317.462,218.589v257.782c0,13.774-11.167,24.94-24.94,24.94h-11.579 c-13.775,0-24.94-11.167-24.94-24.94V359.148v-0.267v117.49c0,13.775-11.167,24.94-24.941,24.94h-11.579 c-13.776,0-24.943-11.167-24.943-24.94V218.589H317.462z">
                                </path>
                                <path style="fill:#FFBAA8;"
                                    d="M259.475,122.923h-6.948c-21.99,0-39.816-17.826-39.816-39.816V50.505 c0-21.989,17.826-39.816,39.816-39.816h6.948c21.99,0,39.816,17.827,39.816,39.816v32.601 C299.291,105.097,281.465,122.923,259.475,122.923z">
                                </path>
                                <polygon style="fill:#ECF0F1;"
                                    points="299.754,122.923 256.001,194.717 212.248,122.923 "></polygon>
                                <polygon style="fill:#0BBBDA;"
                                    points="317.462,218.592 317.462,283.527 255.99,314.792 194.54,283.677 194.54,218.592 ">
                                </polygon>
                                <g>
                                    <circle style="fill:#231F20;" cx="256.001" cy="232.132" r="10.689"></circle>
                                    <circle style="fill:#231F20;" cx="256.001" cy="268.111" r="10.689"></circle>
                                    <path style="fill:#231F20;"
                                        d="M423.565,112.31c5.87-8.252,9.338-18.327,9.338-29.203V50.505C432.903,22.656,410.247,0,382.398,0 h-6.948c-27.849,0-50.505,22.656-50.505,50.505v32.601c0,10.843,3.446,20.889,9.284,29.127h-33.534 c5.838-8.238,9.285-18.285,9.285-29.127V50.505C309.98,22.656,287.324,0,259.475,0h-6.948c-27.849,0-50.505,22.656-50.505,50.505 v32.601c0,10.843,3.447,20.889,9.287,29.127h-33.534c5.837-8.238,9.283-18.285,9.283-29.127V50.505 C187.057,22.656,164.401,0,136.552,0h-6.948c-27.849,0-50.505,22.656-50.505,50.505v32.601c0,10.876,3.467,20.951,9.338,29.203 c-37.537,1.572-67.593,32.454-67.593,70.204v104.217c0,21.66,17.689,39.282,39.434,39.282c0.219,0,0.434-0.019,0.65-0.033v150.391 c0,19.646,15.983,35.629,35.629,35.629h11.579c9.701,0,18.509-3.897,24.94-10.208c6.432,6.311,15.24,10.208,24.94,10.208h11.579 c9.703,0,18.498-3.914,24.93-10.228c6.433,6.32,15.243,10.228,24.952,10.228h11.579c9.701,0,18.509-3.897,24.941-10.208 c6.432,6.311,15.24,10.208,24.94,10.208h11.58c9.709,0,18.52-3.908,24.952-10.228c6.43,6.314,15.225,10.228,24.929,10.228h11.58 c9.7,0,18.509-3.897,24.94-10.208c6.432,6.311,15.24,10.208,24.94,10.208h11.58c19.646,0,35.629-15.983,35.629-35.629V325.979 c0.216,0.013,0.431,0.033,0.65,0.033c21.743,0,39.434-17.622,39.434-39.282V182.514 C491.158,144.763,461.102,113.882,423.565,112.31z M346.323,50.505c0-16.061,13.067-29.127,29.127-29.127h6.948 c16.06,0,29.127,13.066,29.127,29.127v32.601c0,16.061-13.067,29.127-29.127,29.127h-6.948c-16.06,0-29.127-13.066-29.127-29.127 V50.505z M223.4,50.505c0-16.061,13.066-29.127,29.127-29.127h6.948c16.06,0,29.127,13.066,29.127,29.127v32.601 c0,16.061-13.067,29.127-29.127,29.127h-6.948c-16.061,0-29.127-13.066-29.127-29.127V50.505z M280.722,133.612l-24.721,40.565 l-24.721-40.565H280.722z M100.477,50.505c0-16.061,13.066-29.127,29.127-29.127h6.948c16.061,0,29.127,13.066,29.127,29.127 v32.601c0,16.061-13.066,29.127-29.127,29.127h-6.948c-16.061,0-29.127-13.066-29.127-29.127V50.505z M71.617,207.9 c-5.903,0-10.689,4.785-10.689,10.689v0.003v86.075c-0.216-0.013-0.431-0.033-0.65-0.033c-9.956,0-18.056-8.032-18.056-17.904 V182.512c0-26.965,22.079-48.902,49.217-48.902h72.284c-12.341,12.659-19.955,29.909-19.955,48.902V286.73 c0,3.46,0.456,6.815,1.303,10.014l-11.971,6.062l-50.795-25.833v-58.38v-0.004C82.306,212.685,77.52,207.9,71.617,207.9z M169.599,490.622H158.02c-7.859,0-14.252-6.393-14.252-14.252v-117.49c0-5.904-4.785-10.689-10.689-10.689 c-5.903,0-10.689,4.785-10.689,10.689v117.49c0,7.858-6.393,14.252-14.252,14.252H96.557c-7.858,0-14.252-6.393-14.252-14.252 V300.957l45.938,23.364c1.522,0.774,3.184,1.161,4.845,1.161c1.655,0,3.31-0.384,4.829-1.153l18.111-9.171 c7.079,6.717,16.646,10.855,27.171,10.855c0.219,0,0.434-0.019,0.65-0.033V476.37C183.851,484.229,177.458,490.622,169.599,490.622 z M306.773,476.371c0,7.858-6.393,14.252-14.252,14.252h-11.58c-7.859,0-14.252-6.393-14.252-14.252v-117.49 c0-5.904-4.786-10.689-10.689-10.689c-5.903,0-10.689,4.785-10.689,10.689v117.49c0,7.858-6.393,14.252-14.252,14.252h-11.579 c-7.859,0-14.252-6.393-14.252-14.252v-175.3l45.934,23.258c1.519,0.769,3.174,1.153,4.829,1.153c1.662,0,3.323-0.387,4.845-1.161 l45.936-23.365V476.371z M306.773,218.589v0.003v58.38l-50.794,25.834l-50.751-25.697v-58.517v-0.003 c0-5.903-4.785-10.689-10.689-10.689c-5.904,0-10.689,4.785-10.689,10.689v0.003v86.075c-0.216-0.013-0.431-0.033-0.65-0.033 c-9.956,0-18.056-8.032-18.056-17.904V182.512c0-24.346,18.001-44.588,41.472-48.292l40.257,66.058 c1.94,3.184,5.399,5.126,9.127,5.126c3.728,0,7.187-1.942,9.127-5.126l40.257-66.058c23.471,3.703,41.472,23.945,41.472,48.292 V286.73c0,9.872-8.099,17.904-18.056,17.904c-0.219,0-0.434,0.019-0.65,0.033v-86.075v-0.003c0-5.903-4.786-10.689-10.689-10.689 S306.773,212.685,306.773,218.589z M429.696,476.371c0,7.858-6.393,14.252-14.252,14.252h-11.58 c-7.858,0-14.252-6.393-14.252-14.252v-117.49c0-5.904-4.786-10.689-10.689-10.689s-10.689,4.785-10.689,10.689v117.49 c0,7.858-6.393,14.252-14.252,14.252h-11.58c-7.858,0-14.252-6.393-14.252-14.252V325.979c0.216,0.013,0.431,0.033,0.65,0.033 c10.525,0,20.092-4.137,27.171-10.855l18.111,9.171c1.519,0.769,3.174,1.153,4.829,1.153c1.662,0,3.323-0.387,4.845-1.161 l45.938-23.365V476.371z M469.78,286.731c0,9.872-8.099,17.904-18.056,17.904c-0.219,0-0.434,0.019-0.65,0.033v-86.075v-0.004 c0-5.903-4.786-10.689-10.689-10.689s-10.689,4.785-10.689,10.689v0.003v58.38l-50.794,25.834l-11.972-6.062 c0.848-3.198,1.303-6.554,1.303-10.014V182.513c0-18.993-7.615-36.243-19.956-48.902h72.284c27.139,0,49.217,21.937,49.217,48.902 v104.218H469.78z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="ml-2 w-full flex-1">
                        <div>
                            <div class="mt-3 text-3xl font-bold leading-8">1</div>

                            <div class="mt-1 text-base text-gray-600">Total Interns</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                href="#">
                <div class="p-5">
                    <div class="flex justify-between">
                        <svg width="32px" height="32px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                            fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g fill="none" fill-rule="evenodd">
                                    <path fill="#5B68C0"
                                        d="M8,50.9206814 C8,48.707202 9.77500008,46.6994337 11.9692715,46.4356406 L31.875,44.0425936 L51.7807285,46.4356406 C53.9728966,46.6991808 55.75,48.7006188 55.75,50.9206814 L55.75,63.0425936 L8,63.0425936 L8,50.9206814 Z">
                                    </path>
                                    <path fill="#FFDD95"
                                        d="M23.9659091,41.0820517 C19.997906,37.3171352 17.375,31.2233999 17.375,26.1331692 C17.375,18.1250403 23.8668711,11.6331692 31.875,11.6331692 C39.8831289,11.6331692 46.375,18.1250403 46.375,26.1331692 C46.375,31.2233999 43.752094,37.3171352 39.7840909,41.0820517 L39.7840909,49.9058965 C39.7840909,49.9058965 34.4224889,51.8154815 31.875,51.8154815 C29.3275111,51.8154815 23.9659091,49.9058965 23.9659091,49.9058965 L23.9659091,41.0820517 Z">
                                    </path>
                                    <circle cx="17.875" cy="29" r="3" fill="#FFDD95"></circle>
                                    <circle cx="45.875" cy="29" r="3" fill="#FFDD95"></circle>
                                    <path fill="#FFAF40"
                                        d="M13.875,14.5 C13.875,11.4624339 16.3328519,9 19.3759961,9 L45.875,9 L45.875,14.5 C45.875,17.5375661 43.4171481,20 40.3740039,20 L13.875,20 L13.875,14.5 Z"
                                        transform="matrix(-1 0 0 1 59.75 0)"></path>
                                    <circle cx="53" cy="12" r="11" fill="#80D25B"></circle>
                                    <polyline stroke="#FFF" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="3" points="47.873 14.27 53.041 17.318 57.062 6.936"></polyline>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="ml-2 w-full flex-1">
                        <div>
                            <div class="mt-3 text-3xl font-bold leading-8">3</div>

                            <div class="mt-1 text-base text-gray-600">Pending Approvals</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                href="#">
                <div class="p-5">
                    <div class="flex justify-between">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 392.663 392.663"
                            xml:space="preserve" width="32px" height="32px" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path style="fill:#FFFFFF;"
                                    d="M359.855,240.356H32.743c-6.012,0-10.925,4.848-10.925,10.925v8.469h40.727 c6.012,0,10.925,4.848,10.925,10.925c0,6.012-4.848,10.925-10.925,10.925H21.818v19.394h14.933c6.012,0,10.925,4.848,10.925,10.925 c0,6.012-4.848,10.925-10.925,10.925H21.818v18.036c0,6.012,4.848,10.925,10.925,10.925h327.111c6.012,0,10.925-4.848,10.925-10.925 v-89.6C370.78,245.269,365.867,240.356,359.855,240.356z">
                                </path>
                                <g>
                                    <path style="fill:#FFC10D;"
                                        d="M105.341,72.016c13.834,0,25.083-11.313,25.083-25.083s-11.248-25.147-25.083-25.147 S80.259,33.099,80.259,46.869C80.259,60.768,91.507,72.016,105.341,72.016z">
                                    </path>
                                    <rect x="246.077" y="99.362" style="fill:#FFC10D;" width="110.028"
                                        height="77.834"></rect>
                                </g>
                                <g>
                                    <polygon style="fill:#56ACE0;"
                                        points="282.085,218.376 320.097,218.376 311.046,198.982 291.135,198.982 ">
                                    </polygon>
                                    <path style="fill:#56ACE0;"
                                        d="M171.345,165.236c0-11.055-8.986-20.04-20.04-20.04h-15.063l-20.945,48.291 c-3.814,8.727-16.226,8.727-20.04,0l-20.881-48.226H59.313c-11.055,0-20.04,8.986-20.04,20.04v53.333h132.073V165.236 L171.345,165.236z">
                                    </path>
                                </g>
                                <g>
                                    <path style="fill:#194F82;"
                                        d="M105.341,93.867c25.859,0,46.933-21.01,46.933-46.933S131.2,0,105.341,0S58.408,21.01,58.408,46.933 S79.483,93.867,105.341,93.867z M105.341,21.851c13.834,0,25.083,11.313,25.083,25.083s-11.313,25.083-25.083,25.083 S80.259,60.703,80.259,46.933S91.507,21.851,105.341,21.851z">
                                    </path>
                                    <path style="fill:#194F82;"
                                        d="M359.855,218.505h-15.58l-9.115-19.523h31.935c6.012,0,10.925-4.848,10.925-10.925V88.372 c0-6.012-4.848-10.925-10.925-10.925H235.216c-6.012,0-10.925,4.848-10.925,10.925v99.685c0,6.012,4.848,10.925,10.925,10.925 h31.935l-9.115,19.523h-64.84v-53.333c0-23.079-18.683-41.826-41.826-41.826h-22.238c-4.331,0-8.275,2.521-9.956,6.594 l-13.77,31.741l-13.77-31.741c-1.681-4.008-5.624-6.594-9.956-6.594H59.313c-23.079,0-41.826,18.683-41.826,41.826v57.083 C7.143,227.75,0.032,238.61,0.032,251.216v89.471c0,18.101,14.675,32.776,32.711,32.776h1.228v8.275 c0,6.012,4.848,10.925,10.925,10.925s10.925-4.848,10.925-10.925v-8.275H336.84v8.275c0,6.012,4.848,10.925,10.925,10.925 c6.012,0,10.925-4.848,10.925-10.925v-8.275h1.228c18.036,0,32.711-14.675,32.711-32.711v-89.471 C392.566,233.18,377.891,218.505,359.855,218.505z M246.077,177.196V99.362h110.028v77.834H246.077z M320.097,218.376h-38.012 l9.051-19.394h19.911L320.097,218.376z M39.273,165.236c0-11.055,8.986-20.04,20.04-20.04h15.063l20.945,48.291 c3.814,8.727,16.226,8.727,20.04,0l20.945-48.291h15.063c11.055,0,20.04,8.986,20.04,20.04v53.333H39.273V165.236z M370.78,340.687 c0,6.012-4.848,10.925-10.925,10.925H32.743c-6.012,0-10.925-4.848-10.925-10.925V322.65h14.933 c6.012,0,10.925-4.848,10.925-10.925c0-6.012-4.848-10.925-10.925-10.925H21.818v-19.394h40.727 c6.012,0,10.925-4.848,10.925-10.925c0-6.012-4.848-10.925-10.925-10.925H21.818v-8.469c0-6.012,4.848-10.925,10.925-10.925 h327.111c6.012,0,10.925,4.848,10.925,10.925v89.471l0,0V340.687z">
                                    </path>
                                </g>
                                <path style="fill:#56ACE0;"
                                    d="M54.594,329.762h283.539c6.012,0,10.925-4.848,10.925-10.925v-45.834 c0-6.012-4.848-10.925-10.925-10.925h-268.8c2.457,2.004,4.073,5.042,4.073,8.469c0,6.012-4.848,10.925-10.925,10.925H43.604v21.851 c2.392,2.004,4.008,5.042,4.008,8.404c0,3.297-1.552,6.271-3.879,8.275C44.38,325.56,48.97,329.762,54.594,329.762z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <div class="ml-2 w-full flex-1">
                        <div>
                            <div class="mt-3 text-3xl font-bold leading-8">2</div>

                            <div class="mt-1 text-base text-gray-600">Active Interns</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                href="#">
                <div class="p-5">
                    <div class="flex justify-between">
                        <svg height="32px" width="32px" version="1.1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path style="fill:#0084FF;"
                                    d="M486.305,321.422l-36.052-29.691c2.119-11.59,3.233-23.53,3.233-35.731 c0-12.202-1.114-24.142-3.233-35.733l36.052-29.692c6.053-4.985,7.611-13.591,3.693-20.37l-42.704-73.963 c-3.908-6.791-12.149-9.748-19.483-6.983l-43.773,16.397c-18.097-15.427-39.01-27.64-61.864-35.766l-7.679-46.053 c-1.281-7.728-7.965-13.387-15.791-13.387h-85.408c-7.825,0-14.508,5.659-15.789,13.388l-7.678,46.05 c-22.856,8.127-43.771,20.342-61.867,35.768L84.19,89.26c-7.312-2.775-15.566,0.192-19.484,6.982l-42.704,73.964 c-3.918,6.779-2.36,15.385,3.693,20.37l36.052,29.691c-2.118,11.59-3.232,23.53-3.232,35.732c0,12.202,1.114,24.142,3.233,35.732 l-36.052,29.692c-6.053,4.985-7.611,13.591-3.693,20.37l42.704,73.964c3.918,6.79,12.181,9.768,19.484,6.982l43.772-16.397 c18.097,15.427,39.011,27.641,61.865,35.767l7.679,46.052c1.278,7.731,7.984,13.388,15.79,13.388h85.408 c7.819,0,14.504-5.653,15.789-13.388l7.678-46.051c22.856-8.127,43.771-20.341,61.867-35.768l43.772,16.397 c7.324,2.775,15.565-0.193,19.483-6.982l42.704-73.964C493.916,335.012,492.358,326.408,486.305,321.422z">
                                </path>
                                <path style="fill:#FFAF00;"
                                    d="M310.022,320.056v176.806c-2.915,2.915-6.94,4.686-11.317,4.686h-85.408 c-3.769,0-7.27-1.313-10.036-3.544V320.056H310.022z">
                                </path>
                                <path style="fill:#FFD41D;"
                                    d="M310.022,151.555v94.927l-53.381,32.027l-53.381-32.027v-94.927 c-39.228,19.986-64.055,59.844-64.056,104.442c-0.001,66.879,54.481,117.408,117.375,117.439 c64.782,0.033,117.497-52.662,117.497-117.438C374.078,211.401,349.249,171.541,310.022,151.555z">
                                </path>
                                <path
                                    d="M235.082,418.321c-5.771,0-10.449-4.678-10.449-10.449v-4.678c0-5.771,4.678-10.449,10.449-10.449 s10.449,4.678,10.449,10.449v4.678C245.531,413.643,240.852,418.321,235.082,418.321z">
                                </path>
                                <path
                                    d="M492.948,313.357l-31.393-25.855c1.58-10.4,2.38-20.968,2.38-31.502c0-10.534-0.8-21.104-2.381-31.504l31.394-25.856 c10.032-8.262,12.595-22.42,6.099-33.66L456.35,91.029c-4.704-8.173-13.479-13.25-22.903-13.25c-3.19,0-6.326,0.573-9.302,1.695 l-38.108,14.274c-16.546-13.286-34.848-23.869-54.55-31.54l-6.683-40.082C322.676,9.306,311.701,0,298.704,0h-85.408 C200.3,0,189.324,9.307,187.2,22.119l-6.684,40.088c-19.703,7.673-38.007,18.255-54.553,31.542L87.898,79.492 c-2.999-1.138-6.14-1.715-9.338-1.715c-9.413,0-18.191,5.074-22.903,13.241l-42.702,73.96c-6.499,11.244-3.935,25.403,6.097,33.665 l31.394,25.855c-1.58,10.4-2.38,20.969-2.38,31.503c0,10.534,0.8,21.103,2.38,31.503l-31.394,25.856 c-10.032,8.262-12.595,22.42-6.099,33.66l42.703,73.963c4.716,8.171,13.492,13.247,22.904,13.247c3.205,0,6.352-0.581,9.294-1.703 l38.107-14.275c16.547,13.287,34.85,23.87,54.551,31.541l6.682,40.075C189.316,502.692,200.293,512,213.297,512h85.408 c12.991,0,23.967-9.304,26.096-22.118l6.683-40.089c19.705-7.673,38.008-18.255,54.554-31.542l38.07,14.261 c2.999,1.137,6.141,1.713,9.336,1.713c9.411,0,18.185-5.074,22.9-13.241l42.703-73.962 C505.543,335.776,502.979,321.619,492.948,313.357z M299.573,491.025c-0.284,0.044-0.573,0.077-0.868,0.077H245.53v-49.427 c0-5.771-4.678-10.449-10.449-10.449c-5.771,0-10.449,4.678-10.449,10.449v49.427h-10.922V376.504 c13.606,4.844,28.061,7.375,42.865,7.382c0.003,0,0.066,0,0.07,0c14.852,0,29.325-2.528,42.928-7.376v114.515H299.573z M256.642,362.988h-0.057c-58.964-0.029-106.933-48.026-106.932-106.99c0.001-34.314,16.175-65.814,43.158-85.745v76.229 c0,3.671,1.926,7.072,5.073,8.96l53.381,32.027c3.309,1.984,7.443,1.984,10.752,0l53.381-32.027c3.147-1.889,5.073-5.29,5.073-8.96 v-76.229c26.983,19.931,43.158,51.432,43.157,85.747c0,28.528-11.143,55.382-31.374,75.614 C312.022,351.846,285.169,362.988,256.642,362.988z M480.949,336.57l-42.705,73.965c-1.326,2.296-4.122,3.423-6.769,2.42 l-43.772-16.397c-3.557-1.331-7.555-0.63-10.444,1.834c-16.925,14.428-36.026,25.589-56.79,33.212v-64.78 c9.585-5.551,18.513-12.386,26.56-20.434c24.179-24.18,37.495-56.281,37.495-90.391c0.001-48.242-26.73-91.831-69.761-113.754 c-3.239-1.651-7.103-1.498-10.203,0.401c-3.099,1.9-4.989,5.274-4.989,8.909v89.011l-42.932,25.759l-42.932-25.759v-89.011 c0-3.635-1.89-7.009-4.989-8.909c-3.099-1.899-6.963-2.05-10.203-0.401c-43.03,21.922-69.761,65.51-69.762,113.752 c-0.001,34.743,13.583,67.154,38.247,91.26c7.858,7.68,16.53,14.23,25.809,19.585v65.235c-21.258-7.63-40.795-18.958-58.071-33.684 c-1.922-1.638-4.333-2.497-6.78-2.497c-1.232,0-2.473,0.217-3.663,0.664l-43.83,16.419c-0.613,0.234-1.255,0.353-1.905,0.353 c-1.969,0-3.81-1.071-4.805-2.796l-42.706-73.968c-1.365-2.361-0.822-5.337,1.288-7.076L68.389,299.8 c2.926-2.411,4.318-6.216,3.635-9.944c-2.03-11.12-3.061-22.509-3.061-33.856c0-11.346,1.03-22.736,3.063-33.854 c0.681-3.729-0.709-7.535-3.636-9.944l-36.051-29.691c-2.112-1.74-2.654-4.716-1.287-7.08l42.705-73.966 c1.323-2.294,4.109-3.429,6.769-2.419l43.772,16.395c3.555,1.33,7.554,0.63,10.444-1.833c17.417-14.847,37.129-26.244,58.59-33.876 c3.576-1.272,6.182-4.382,6.805-8.126l7.679-46.059c0.446-2.694,2.752-4.649,5.482-4.649h85.408c2.73,0,5.036,1.955,5.485,4.656 l7.679,46.053c0.624,3.744,3.23,6.856,6.806,8.126c21.459,7.631,41.17,19.027,58.586,33.873c2.89,2.463,6.888,3.165,10.444,1.833 l43.794-16.405c0.631-0.238,1.287-0.358,1.95-0.358c1.97,0,3.806,1.064,4.798,2.789l42.706,73.967 c1.365,2.361,0.822,5.337-1.288,7.076l-36.052,29.692c-2.926,2.411-4.318,6.215-3.635,9.944c2.03,11.118,3.061,22.509,3.061,33.855 s-1.03,22.735-3.063,33.853c-0.681,3.728,0.709,7.535,3.636,9.944l36.051,29.691C481.774,331.227,482.316,334.205,480.949,336.57z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <div class="ml-2 w-full flex-1">
                        <div>
                            <div class="mt-3 text-3xl font-bold leading-8">3</div>

                            <div class="mt-1 text-base text-gray-600">Total Admin</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 h-auto gap-4 mt-5">
            <div class="text-center">`
                <div
                    class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg border p-6 bg-white">
                    <h3 class="font-bold">Daily Intern Attendance Tracker</h3>
                    <canvas id="attendanceTracker"></canvas>
                </div>
            </div>
            <div class="text-center">
                <div
                    class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg border p-6 bg-white">
                    <h3 class="font-bold">Department Intern Attendance Tracker</h3>
                    <canvas id="departmentTracker"></canvas>
                </div>
            </div>
    </section>
    </div>
    {{-- script for attendace tracker --}}
    <script>
        var attendanceTracker = document.getElementById('attendanceTracker').getContext('2d');
        var myPieChart = new Chart(attendanceTracker, {
            type: 'pie',
            data: {
                labels: ['Timed In', 'Not Timed In'],
                datasets: [{
                    backgroundColor: ['#36a2eb', '#ff6384'],
                    data: [{{ $timedInPercentage }}, {{ $notTimedInPercentage }}]
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Attendance Tracker'
                }
            }
        });
    </script>
    {{-- Department Attendance --}}
    <script>
        var departmentTracker = document.getElementById('departmentTracker').getContext('2d');
        var myPieChart = new Chart(departmentTracker, {
            type: 'bar',
            data: {
                labels: ['Technology', 'People', 'Operations', 'BizDev'],
                datasets: [{
                    backgroundColor: ['#36a2eb', '#ff6384', '#ff3112', '#f31234'],
                    data: ['23', '22', '12', '34'],
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Department Attendance'
                }
            }
        });
    </script>
</x-layout>
