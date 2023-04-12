<template>
    <div class="3xl:container h-screen p-3 bg-white">
        <div class="font-rubik-light">
            <p class="text-base font-bold">COMMITED RATE AS OF: <br>
               <span class="text-sm">SEPTEMBER 28,2022 08:00:00 AM</span> 
            </p>
        </div>
        <div class="flex justify-between mt-3 pb-5 font-rubik-light border-b-2 border-solid border-#EAEAEA">
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.00</h3>
                <p class="text-5xs text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-6xs font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.01</h3>
                <p class="text-5xs text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-6xs font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">49.99</h3>
                <p class="text-5xs text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-6xs font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.02</h3>
                <p class="text-5xs text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-6xs font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">49.98</h3>
                <p class="text-5xs text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-6xs font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 px-1 border-l-2 border-b-2 border-#EAEAEA text-center text-black flex flex-col justify-end">
                <img src="../../../../../assets/images/usd_to_php_graph.png" alt="graph-image"/>
                <p class="text-xs text-left font-medium">USD to PHP</p>
            </div>
        </div>
        <div class="flex justify-between w-full h-4/6 my-5">
            <div class="h-full overflow-y-auto">
                <table class="h-full border-collapse border-2 border-#EAEAEA w-80 text-center">
                    <thead class="sticky top-0">
                        <tr>
                            <th class="bg-#3E3E3E text-white text-sm text-bold" colspan="2">BANK BALANCES</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9 font-extralight text-sm">BANKS</th>
                            <th class="bg-#D9D9D9 font-extralight text-sm">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        <tr class="border-b border-#EAEAEA">
                            <td> - </td>
                            <td class="border-solid border-l-2 border-#EAEAEA"> - </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="h-full overflow-y-auto">
                <table class="h-full border-collapse border-2 border-#EAEAEA w-80 text-center overflow-auto">
                    <thead class="sticky top-0">
                        <tr>
                            <th class="bg-#3E3E3E text-white text-sm text-bold" colspan="2">TIE-UPS FUNDS</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9 font-extralight text-sm">TIE-UPS</th>
                            <th class="bg-#D9D9D9 font-extralight text-sm">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        <tr class="border-b border-#EAEAEA">
                            <td> - </td>
                            <td class="border-solid border-l-2 border-#EAEAEA"> - </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="h-full overflow-y-auto">
                <table class="h-full border-collapse border-2 border-#EAEAEA w-80 text-center">
                    <thead class="sticky top-0">
                        <tr>
                            <th class="bg-#3E3E3E text-white text-sm text-bold" colspan="2">BANK & PROVIDERS FUNDS</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9 font-extralight text-sm">BANKS & PROVIDERS</th>
                            <th class="bg-#D9D9D9 font-extralight text-sm">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        <tr class="border-b border-#EAEAEA">
                            <td> - </td>
                            <td class="border-solid border-l-2 border-#EAEAEA"> - </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>