<script>
import axios from 'axios';
import SmallHeading from '../../../Misc/Heading/SmallHeading.vue';
import ImageUploadIcon from '../../../Misc/Icons/ImageUploadIcon.vue';
import MinusIcon from '../../../Misc/Icons/MinusIcon.vue';
import PlusIcon from '../../../Misc/Icons/PlusIcon.vue';
import Title from '../../../Misc/Section/Title.vue';
import SelectMenu from '../../../Misc/Select Menu/SelectMenu.vue';
import NormalBtn from '../../../Misc/Buttons/NormalButton.vue';
import EditIcon from "../../../Misc/Icons/EditIcon.vue";
import DeleteIcon from "../../../Misc/Icons/DeleteIcon.vue";
import InputLabel from '../../../Misc/Input/InputLabel.vue';
import SettingsInput from '../../../Misc/Input/SettingsInput.vue';
import {Form} from 'vform';

export default {
    name: 'Edit Branch',
    components: {
        Title,
        SelectMenu,
        SmallHeading,
        NormalBtn,
        ImageUploadIcon,
        MinusIcon,
        PlusIcon,
        EditIcon,
        InputLabel,
        SettingsInput,
        DeleteIcon
    },
    data() {
        return {
            branch: new Form({
                id: "",
                logo: "",
                company: "",
                branch_id: "",
                type_of_charging: "",
                type_of_fee: "",
                branch_name: "",
                contact_no: "",
                branch_address: "",
                country: "",
                city: "",
                region: "",
                province: "",
                reference_number: "",
                preview_reference_number: "",
                zip_code: "",
                currencies: [
                    {
                        from_currency: null,
                        to_currency: null,
                    },
                    {
                        from_currency: null,
                        to_currency: null,
                    },
                ],
            }),
            new_currencies: [
                {
                    from_currency: null,
                    to_currency: null,
                },
            ],
            companies: [],
            countries: [],
            regions: [],
            provinces: [],
            cities: [],
            isEdit: false,
            currency: [],
            modalOpen: false,
            isDelete: false,
            url: null,
            showButton: true

        }
    },
    methods: {
        async getBranch() {
            await axios.get(`/api/branches/${this.$route.params.id}`)
                .then((response) => {
                    let data = response.data;
                    this.branch.id = data.id;
                    this.branch.company = data.company_name;
                    this.branch.branch_id = data.branch_id;
                    this.branch.type_of_charging = data.type_of_charging;
                    this.branch.type_of_fee = data.type_of_fee;
                    this.branch.branch_name = data.name;
                    this.branch.contact_no = data.contact_number;
                    this.branch.country = data.country.name;
                    this.branch.region = data.region.name;
                    this.branch.province = data.province.name;
                    this.branch.city = data.city.name;
                    this.branch.zip_code = data.zip_code;
                    this.branch.logo = data.logo;
                    this.branch.preview_reference_number = data.reference_number;
                    this.branch.branch_address = data.address;
                    this.branch.currencies = data.currency;
                });
        },
        async updateBranchDetails(){
            await this.branch.put(`/api/branches/${this.branch.id}`)
                .then((response) => {
                    console.log(response);
                });
        },
        async getCompanies(){
            const response = await axios.get("/api/companies");
            this.companies = response.data;
        },
        async getCountries() {
            axios
                .get("/api/country/list")
                .then((response) => (this.countries = response.data));
        },
        async getStatesByCountry(country) {
            try {
                const response = await axios.get(
                    `/api/state/${country.value ? country.value : country.id}/list`
                );
                this.regions = response.data;
            } catch (error) { }
        },
        async getProvinces(region) {
            try {
                const response = await axios.get(
                    `/api/province/${region.country_id}/${region.value ? region.value : region.id}/${region.fips_code}/list`,
                    region
                );
                this.provinces = response.data;
            } catch (error) { }
        },
        async getCityByProvince(province) {
            try {
                const response = await axios.get(
                    `/api/city/${province.iso2 ? province.iso2 : this.branch.province.iso2}/list`
                );
                this.cities = response.data;
            } catch (error) { }
        },
        pickFile() {
            let input = this.$refs.fileBranchPix;
            let file = input.files;

            if (file && file[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.url = e.target.result;
                    this.branch.logo = e.target.result;
                };
                reader.readAsDataURL(file[0]);
                this.$emit("input", file[0]);
            }
        },
    },
    created() {
        this.getBranch();
        // this.getCountryCurrency()
        this.getCompanies();
        this.getCountries();
    },
}

</script>

<template>
    <div class="w-full border shadow-md bg-white border-white h-screen">
        <form @submit.prevent="updateBranchDetails()">
            <div class="grid grid-cols-2">
                <div class="flex p-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <span v-if="!branch.logo" class="relative h-28 w-28 overflow-hidden rounded-full bg-[#ECECEC] flex justify-center items-center">
                                <ImageUploadIcon class="h-8" />
                            </span>
                            <img class="mx-4 w-28 h-16" :src="`/images/` + branch.logo" />
                        </div>
                        <div class="text-left">
                            <div class="text-[10px]  mb-4">
                                <p>MAX. FILE SIZE: <strong>1MB</strong></p>
                                <p>SUPPORTED FILE TYPES: <strong>JPG, JPEG, PNG</strong></p>
                            </div>
                            <input type="file" id="files" class="hidden" @change="pickFile" accept="image/*"
                                   ref="fileBranchPix" />
                            <label
                                class="text-white transition ease-in-out delay-150 hover:translate-y-1 duration-300
                             hover:border-[#F26400] tracking-wider hover:text-white bg-[#F9951E] text-[12px] uppercase
                             font-bold py-1 px-6 hover:cursor-pointer border-[3px] border-[#F9951E]"
                                for="files">
                                Upload
                            </label>
                        </div>
                    </div>
                </div>
                <!--company -->
                <div class="p-4 ml-40">
                    <div class="w-full relative">
                        <InputLabel label="Company" />
                        <v-select label="name" :class="{'border-mid-red border-2' : branch.errors.has('company')}" v-model="branch.company" placeholder="Select Company" class="border w-full border-gray-300" :options="companies"></v-select>
                    </div>
                    <div class="w-full">
                        <InputLabel label="Branch Id"/>
                        <div class="flex w-full items-center">
                            <SettingsInput v-model="branch.branch_id" disabled placeholder="[Auto-Generated]" class="uppercase bg-[#eaeaea] placeholder:text-black w-full text-center placeholder:text-[10px]" />
                        </div>
                    </div>
                    <div class="w-full relative">
                        <InputLabel label="Type of Charging" />
                        <v-select :class="{'border-mid-red border-2' : branch.errors.has('type_of_charging')}" v-model="branch.type_of_charging" placeholder="SELECT TYPE OF CHARGING TO CUSTOMERS" class="border w-full border-gray-300" :options="type_of_charging"></v-select>
                    </div>
                    <div class="w-full relative">
                        <InputLabel label="Type of Fee" />
                        <v-select :class="{'border-mid-red border-2' : branch.errors.has('type_of_fee')}" v-model="branch.type_of_fee" placeholder="SELECT TYPE OF FEE" class="border w-full border-gray-300" :options="type_of_fee"></v-select>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <SmallHeading label="Branch Details" class="text-center w-[20%] text-[12px]" />
                <div class="p-4">
                    <div class="flex space-x-4 px-4">
                        <div class="w-full relative">
                            <InputLabel label="Branch Name" />
                            <div class="flex w-full items-center">
                                <SettingsInput @input="generateBranchId" v-model="branch.branch_name" id="branch-name" :class="
                                branch.errors.has('branch_name')
                                    ? 'bg-white w-full placeholder:tracking-widest border-red-500 border-[1px] placeholder:text-gray-500 uppercase'
                                    : 'bg-white w-full placeholder:tracking-widest placeholder:text-gray-500 uppercase'
                            " placeholder="Enter Branch Name" required="required" />
                            </div>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="Branch Contact Number" />
                            <div class="flex items-center">
                                <SettingsInput v-model="branch.contact_no" label="Contact No." :class="
                                branch.errors.has('contact_no')
                                    ? 'bg-white w-full placeholder:tracking-widest border-red-500 border-[1px] placeholder:text-gray-500 uppercase'
                                    : 'bg-white w-full placeholder:tracking-widest placeholder:text-gray-500 uppercase'
                            " placeholder="Enter Contact No." required="required" />
                            </div>
                        </div>
                    </div>
                    <div class="flex px-4 py-2">
                        <div class="w-full relative">
                            <InputLabel label="Branch Address" />
                            <div class="flex items-center">
                                <SettingsInput v-model="branch.branch_address"
                                               placeholder="No., Street, Phase / Village / Subdivision / Municipality"
                                               label="Branch Address" :class="branch.errors.has('branch_address')
                                        ? 'bg-white w-full placeholder:tracking-widest border-red-500 border-[1px] placeholder:text-gray-500 uppercase'
                                        : 'bg-white w-full placeholder:tracking-widest placeholder:text-gray-500 uppercase'
                                " required="required" />
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4 px-4">
                        <div class="w-full relative">
                            <InputLabel label="Country" />
                            <div class="flex items-center ">
                                <v-select class="border border-gray-300 shadow-sm" placeholder="Select Country" v-model="branch.country"
                                          :class="branch.errors.has('country') ? 'w-full border-[2px] border-red-500' : 'w-full'"
                                          @option:selected="getStatesByCountry" :options="countries">
                                </v-select>
                            </div>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="Region" />
                            <div class="flex items-center">
                                <v-select class="border border-gray-300 shadow-sm" placeholder="Enter Region " v-model="branch.region" :class="
                                    branch.errors.has('region')
                                        ? 'w-full border-[2px] border-red-500'
                                        : 'w-full'
                                " @option:selected="getProvinces" :options="regions"></v-select>
                            </div>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="Province" />
                            <div class="flex items-center">
                                <v-select class="border border-gray-300 shadow-sm" placeholder="Select Province " v-model="branch.province" :class="
                                    branch.errors.has('province')
                                        ? 'w-full border-[2px] border-red-500'
                                        : 'w-full'
                                " @option:selected="getCityByProvince" :options="provinces">
                                </v-select>
                            </div>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="City" />
                            <div class="flex items-center">
                                <v-select class="border border-gray-300 shadow-sm" placeholder="Select City " v-model="branch.city" :class="
                                    branch.errors.has('city')
                                        ? 'w-full border-[2px] border-red-500'
                                        : 'w-full'
                                " :options="cities">
                                </v-select>
                            </div>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="Zip Code" />
                            <div class="flex items-center">
                                <SettingsInput v-model="branch.zip_code" :class="
                                    branch.errors.has('zip_code')
                                        ? 'bg-white w-full placeholder:tracking-widest border-red-500 border-[1px] placeholder:text-gray-500 uppercase'
                                        : 'bg-white w-full placeholder:tracking-widest placeholder:text-gray-500 uppercase'
                                " label="Zip Code" placeholder="Enter Zip Code" required="required" />
                            </div>
                        </div>
                    </div>
                    <div class="flex px-4 py-2 space-x-4">
                        <div class="w-full relative">
                            <InputLabel label="Enter Reference Number" />
                            <div class="flex items-center">
                                <SettingsInput @input="reference_number" v-model="branch.reference_number"
                                               placeholder="Enter Prefix"
                                               label="Branch Address" :class="branch.errors.has('reference_number')
                                        ? 'bg-white w-full placeholder:tracking-widest border-red-500 border-[1px] placeholder:text-gray-500 uppercase'
                                        : 'bg-white w-full placeholder:tracking-widest placeholder:text-gray-500 uppercase'
                                " required="required" />
                            </div>
                        </div>
                        <div class="w-full">
                            <InputLabel label="Preview of Reference Number" />
                            <div class="flex items-center">
                                <SettingsInput disabled v-model="branch.preview_reference_number"
                                               placeholder="[Auto Generated]"
                                               label="Branch Address" class="bg-[#eaeaea] text-center w-full placeholder:tracking-widest placeholder:text-[#3e3e3e] uppercase" required="required" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-center space-x-4">
                    <SmallHeading label="Currencies" class="text-center w-[20%] text-[12px]" />
                    <div class="flex items-center space-x-4">
                        <button @click.prevent="addSelection()"
                                class="bg-white px-2 py-1  text-[#F9951E] hover:text-white font-bold rounded-sm border-[3px]  duration-300 hover:border-[#F26400]/90 border-#F9951E hover:bg-[#F26400]/90">
                            <PlusIcon class="w-4 h-4" />
                        </button>
<!--                        v-if="branch.currencies.length > 2" @click.prevent="removeSelection(index)"-->
                        <button
                                class="bg-white px-2 py-1 text-red-500 hover:text-white font-bold  rounded-sm border-[3px]  duration-300 hover:border-red-500/90 border-red-500 hover:bg-mid-red">
                            <MinusIcon class="w-4 h-4" />
                        </button>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="p-4 ml-2 bg-white h-[10rem] z-10 w-[30%] border mt-4 shadow-md absolute overflow-y-scroll">
                    <div class="flex h-[4.2rem] items-center space-x-2 w-full px-4" v-for="(item, index) in branch.currencies" :key="index">
                        <div class="w-full relative">
                            <InputLabel label="From" />
                            <label v-if="branch.errors.has('currencies.' + index + '.from_currency')"
                                   class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ branch.errors.get('currencies.' + index + '.from_currency') }}
                            </label>
                            <v-select :class="{'border-2 border-mid-red' : branch.errors.get('currencies.' + index + '.from_currency')}" v-model="item.from_currency" :options="currency" placeholder="From Currency" class="border border-gray-300"></v-select>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="To" />
                            <label v-if="branch.errors.has('currencies.' + index + '.to_currency')"
                                   class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ branch.errors.get('currencies.' + index + '.to_currency') }}
                            </label>
                            <v-select :class="{'border-2 border-mid-red' : branch.errors.get('currencies.' + index + '.to_currency')}" v-model="item.to_currency" :options="currency" placeholder="To Currency" class="border border-gray-300"></v-select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end space-x-4 p-10">
                <router-link :to="{name: 'branch'}" class="uppercase cursor-pointer duration-300 hover:bg-[#3e3e3e]/90 tracking-widest text-[12px] border px-10 py-2 bg-[#3e3e3e] text-white">
                    Cancel
                </router-link>
                <NormalBtn label="Update" class="uppercase z-10 duration-300 hover:bg-[#F9951E]/90 tracking-widest text-[12px] border px-10 py-2 bg-[#F9951E] text-white" />
            </div>
        </form>
    </div>
</template>
