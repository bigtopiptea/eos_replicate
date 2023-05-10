<template>
    <div class="3xl:container h-screen p-3 bg-white w-full">
        <div>
            <p class="text-base font-bold">COMMITED RATE AS OF: <br>
               <span class="text-sm">SEPTEMBER 28,2022 08:00:00 AM</span> 
            </p>
        </div>
        <div class="flex justify-between mt-3 pb-5  border-b-2 border-[#EAEAEA]">
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.00</h3>
                <p class="text-[8px] text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-[7px] font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.01</h3>
                <p class="text-[8px] text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-[7px] font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">49.99</h3>
                <p class="text-[8px] text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-[7px] font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.02</h3>
                <p class="text-[8px] text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-[7px] font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">49.98</h3>
                <p class="text-[8px] text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-[7px] font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 px-1 border-l-2 border-b-2 border-#EAEAEA text-center text-black flex flex-col justify-end">
                <img src="../../../../../assets/images/usd_to_php_graph.png" alt="graph-image"/>
                <p class="text-xs text-left font-medium">USD to PHP</p>
            </div>
        </div>
        <div class="flex justify-between gap-[15px] w-full h-auto my-5">
            <div class="h-auto overflow-y-auto">
                <table class="h-full w-[350px] text-center">
                    <thead class="sticky top-0 font-medium text-[11px]">
                        <tr>
                            <th class="bg-#3E3E3E text-white" colspan="2">BANK BALANCES</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9">BANKS</th>
                            <th class="bg-#D9D9D9">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="border-2 border-#EAEAEA divide-y divide-gray-200">
                        <tr class="divide-x divide-gray-200">
                            <td> - </td>
                            <td> - </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="h-auto overflow-y-auto">
                <table class="h-full w-[350px] text-center">
                    <thead class="sticky top-0 font-medium text-[11px]">
                        <tr>
                            <th class="bg-#3E3E3E text-white" colspan="2">TIE-UPS FUNDS</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9">TIE-UPS</th>
                            <th class="bg-#D9D9D9">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="border-2 border-#EAEAEA divide-y divide-gray-200">
                        <tr class="divide-x divide-gray-200">
                            <td> - </td>
                            <td> - </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="h-auto  overflow-y-auto">
                <table class="h-full w-[350px] text-center">
                    <thead class="sticky top-0 font-medium text-[11px]">
                        <tr>
                            <th class="bg-#3E3E3E text-white" colspan="2">BANK & PROVIDERS FUNDS</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9">BANKS & PROVIDERS</th>
                            <th class="bg-#D9D9D9">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="border-2 border-#EAEAEA divide-y divide-gray-200">
                        <tr class="divide-x divide-gray-200">
                            <td> - </td>
                            <td> - </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<style>
/* width */
*::-webkit-scrollbar {
  width: 5px;
  height: 5px;
}

/* Track */
*::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
*::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 10px;
}

/* Handle on hover */
*::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>