
@extends('layouts.appFront')
@section('title') - Inscription des cooperatives @endsection
@push('stylesheet')
   <style>
            .web-safe {
                    font-family: 'Avenir-black' ;
                }

            .select2-container--default .select2-selection--single {
                background-color: #fff;
                border: 1px solid #aaa;
                border-radius: 0px;
                padding-top: 10px;
                padding-left: 4px;
                padding-bottom: 30px;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #444;
                line-height: 15px;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                display: none;
            }

            .selectize-input, .selectize-input input {
                color: #303030;
                font-family: inherit;
                font-size: 10px;
                /* line-height: 44px; */
                font-smoothing: inherit;
                border: 1px solid #aaa;
                border-radius: 0px;
               
            }

            .selectize-input.dropdown-active {
                border-radius: 0px;
            }

            .selectize-control.multi .selectize-input [data-value] {
                text-shadow: 0 1px 0 rgba(0,51,83,.3);
                border-radius: 0px;
                background-color: #778801;
                border: 1px solid #778801;
                background-image: linear-gradient(to bottom,#778801,#97a533);
                background-repeat: repeat-x;
                box-shadow: 0 1px 0 rgba(0,0,0,.2),inset 0 1px rgba(255,255,255,.03)
            }

            .selectize-control.multi .selectize-input [data-value].active {
                background-color: #778801;
                border: 1px solid #778801;
                background-image: linear-gradient(to bottom,#778801,#97a533);
                background-repeat: repeat-x;
            }

            .selectize-control.multi .selectize-input>div.active {
                background: #92c836;
                color: #fff;
                border: 1px solid #778801;
            }
    </style>
@endpush
@section('content')
<div class="bg-amber-200/50 py-14">
    <nav class="bg-grey-light w-full rounded-md">
        <ol class="list-reset flex mx-14">
            <li>
            <a
                href="{{ route('pages.acceuil') }}"
                class="text-amber-950 transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400"
                >Acceuil</a
            >
            </li>
            <li>
            <span class="mx-2 text-neutral-400">></span>
            </li>
            <li>
            <a
                href="{{ route('pages.createCoop') }}"
                class="text-amber-400 transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400"
                >Inscription de Cooperative</a
            >
            </li>
        
        </ol>
    </nav>
    

</div>
<div class="px-4 md:px-24 pt-24 pb-10  w-full">
        <div class="grid place-items-center">
            <div class="titles-container grid place-items-center">
                <img src="{{ asset('assets/img/circle-icons.png') }}" alt="">
                <h1 class="text-3xl uppercase font-bold text-amber-950">Formulaire d'enregistrement de Cooperative</h1>
            </div>

            
        </div>
        <div class="text-lg my-4 ">
           
           
            @livewire('cooperative.cooperative-component')
        </div>
</div>
@endSection

@push('javascript')

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script>
        document.addEventListener('livewire:navigated', () => { 
            //$('#bank').select2();

            Livewire.hook('morph.updated', ({ el, component }) => {
              
                //$('#bank').select2();
            })

        })

        //   document.addEventListener("alpine:init", () => {
        //     Alpine.data("multiselect", () => ({
        //         style: {
        //         wrapper: "w-full relative",
        //         select:
        //             "border w-full border-gray-800 rounded py-[2px] px-2 text-sm flex gap-2 items-center cursor-pointer bg-white",
        //         menuWrapper:
        //             "w-full rounded-lg py-1.5 text-sm mt-1 shadow-lg absolute bg-white z-10",
        //         menu: "max-h-52 overflow-y-auto",
        //         textList: "overflow-x-hidden text-ellipsis grow whitespace-nowrap",
        //         trigger: "px-2 py-2 ",
        //         badge: "py-1.5 px-3 rounded-full bg-neutral-100",
        //         search:
        //             "px-3 py-2 w-full border-0 border-b-2 border-neutral-100 pb-3 outline-0 mb-1",
        //         optionGroupTitle:
        //             "px-3 py-2 text-neutral-400 uppercase font-bold text-xs sticky top-0 bg-white",
        //         clearSearchBtn: "absolute p-3 right-0 top-1 text-neutral-600",
        //         label: "hover:bg-neutral-50 cursor-pointer flex py-2 px-3"
        //         },

        //         icons: {
        //         times:
        //             '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4"><g xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-linecap="round" stroke-width="2"><path d="M6 18L18 6M18 18L6 6"/></g></svg>',
        //         arrowDown:
        //             '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4"><path xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-width="2" d="M5 10l7 7 7-7"/></svg>'
        //         },

        //         init() {
        //         const style = this.style;

        //         const originalSelect = this.$el;
        //         originalSelect.classList.add("hidden");

        //         const wrapper = document.createElement("div");
        //         wrapper.className = style.wrapper;
        //         wrapper.setAttribute("x-data", "newSelect");

        //         const newSelect = document.createElement("div");
        //         newSelect.className = style.select;
        //         newSelect.setAttribute("x-bind", "selectTrigger");

        //         const textList = document.createElement("span");
        //         textList.className = style.textList;

        //         const triggerBtn = document.createElement("button");
        //         triggerBtn.className = style.trigger;
        //         triggerBtn.innerHTML = this.icons.arrowDown;

        //         const countBadge = document.createElement("span");
        //         countBadge.className = style.badge;
        //         countBadge.setAttribute("x-bind", "countBadge");

        //         newSelect.append(textList);
        //         newSelect.append(countBadge);
        //         newSelect.append(triggerBtn);

        //         const menuWrapper = document.createElement("div");
        //         menuWrapper.className = style.menuWrapper;
        //         menuWrapper.setAttribute("x-bind", "selectMenu");

        //         const menu = document.createElement("div");
        //         menu.className = style.menu;

        //         const search = document.createElement("input");
        //         search.className = style.search;
        //         search.setAttribute("x-bind", "search");
        //         search.setAttribute("placeholder", "filter");

        //         const clearSearchBtn = document.createElement("button");
        //         clearSearchBtn.className = style.clearSearchBtn;
        //         clearSearchBtn.setAttribute("x-bind", "clearSearchBtn");
        //         clearSearchBtn.innerHTML = this.icons.times;

        //         menuWrapper.append(search);
        //         menuWrapper.append(menu);
        //         menuWrapper.append(clearSearchBtn);

        //         originalSelect.parentNode.insertBefore(
        //             wrapper,
        //             originalSelect.nextSibling
        //         );

        //         const itemGroups = originalSelect.querySelectorAll("optgroup");

        //         if (itemGroups.length > 0) {
        //             itemGroups.forEach((itemGroup) => processItems(itemGroup));
        //         } else {
        //             processItems(originalSelect);
        //         }

        //         function processItems(parent) {
        //             const items = parent.querySelectorAll("option");
        //             const subMenu = document.createElement("ul");
        //             const groupName = parent.getAttribute("label") || null;

        //             if (groupName) {
        //             const groupTitle = document.createElement("h5");
        //             groupTitle.className = style.optionGroupTitle;
        //             groupTitle.innerText = groupName;
        //             groupTitle.setAttribute("x-bind", "groupTitle");
        //             menu.appendChild(groupTitle);
        //             }

        //             items.forEach((item) => {
        //             const li = document.createElement("li");
        //             li.setAttribute("x-bind", "listItem");

        //             const checkBox = document.createElement("input");
        //             checkBox.classList.add("mr-3", "mt-1");
        //             checkBox.type = "checkbox";
        //             checkBox.value = item.value;
        //             checkBox.id = originalSelect.name + "_" + item.value;

        //             const label = document.createElement("label");
        //             label.className = style.label;
        //             label.setAttribute("for", checkBox.id);
        //             label.innerText = item.innerText;

        //             checkBox.setAttribute("x-bind", "checkBox");

        //             if (item.hasAttribute("selected")) {
        //                 checkBox.checked = true;
        //             }
        //             label.prepend(checkBox);
        //             li.append(label);
        //             subMenu.appendChild(li);
        //             });
        //             menu.appendChild(subMenu);
        //         }

        //         wrapper.appendChild(newSelect);
        //         wrapper.appendChild(menuWrapper);

        //         Alpine.data("newSelect", () => ({
        //             open: false,
        //             showCountBadge: false,
        //             items: [],
        //             selectedItems: [],
        //             filterBy: "",
        //             init() {
        //             this.regenerateTextItems();
        //             },

        //             regenerateTextItems() {
        //             this.selectedItems = [];
        //             this.items.forEach((item) => {
        //                 const checkbox = item.querySelector("input[type=checkbox]");
        //                 const text = item.querySelector("label").innerText;
        //                 if (checkbox.checked) {
        //                 this.selectedItems.push(text);
        //                 }
        //             });

        //             if (this.selectedItems.length > 1) {
        //                 this.showCountBadge = true;
        //             } else {
        //                 this.showCountBadge = false;
        //             }

        //             if (this.selectedItems.length === 0) {
        //                 textList.innerHTML = '<span class="text-neutral-400">select</span>';
        //             } else {
        //                 textList.innerText = this.selectedItems.join(", ");
        //             }
        //             },

        //             selectTrigger: {
        //             ["@click"]() {
        //                 this.open = !this.open;

        //                 if (this.open) {
        //                 this.$nextTick(() =>
        //                     this.$root.querySelector("input[x-bind=search]").focus()
        //                 );
        //                 }
        //             }
        //             },
        //             selectMenu: {
        //             ["x-show"]() {
        //                 return this.open;
        //             },
        //             ["x-transition"]() {},
        //             ["@keydown.escape.window"]() {
        //                 this.open = false;
        //             },
        //             ["@click.away"]() {
        //                 this.open = false;
        //             },
        //             ["x-init"]() {
        //                 this.items = this.$el.querySelectorAll("li");
        //                 this.regenerateTextItems();
        //             }
        //             },
        //             checkBox: {
        //             ["@change"]() {
        //                 const checkBox = this.$el;

        //                 if (checkBox.checked) {
        //                 originalSelect
        //                     .querySelector("option[value='" + checkBox.value + "']")
        //                     .setAttribute("selected", true);
        //                 } else {
        //                 originalSelect
        //                     .querySelector("option[value='" + checkBox.value + "']")
        //                     .removeAttribute("selected");
        //                 }
        //                 this.regenerateTextItems();
        //             }
        //             },
        //             countBadge: {
        //             ["x-show"]() {
        //                 return this.showCountBadge;
        //             },
        //             ["x-text"]() {
        //                 return this.selectedItems.length;
        //             }
        //             },
        //             search: {
        //             ["@keydown.escape.stop"]() {
        //                 this.filterBy = "";
        //                 this.$el.blur();
        //             },
        //             ["@keyup"]() {
        //                 this.filterBy = this.$el.value;
        //             },
        //             ["x-model"]() {
        //                 return this.filterBy;
        //             }
        //             },
        //             clearSearchBtn: {
        //             ["@click"]() {
        //                 this.filterBy = "";
        //             },
        //             ["x-show"]() {
        //                 return this.filterBy.length > 0;
        //             }
        //             },
        //             listItem: {
        //             ["x-show"]() {
        //                 return (
        //                 this.filterBy === "" ||
        //                 this.$el.innerText
        //                     .toLowerCase()
        //                     .startsWith(this.filterBy.toLowerCase())
        //                 );
        //             }
        //             },
        //             groupTitle: {
        //             ["x-show"]() {
        //                 if (this.filterBy === "") return true;

        //                 let atLeastOneItemIsShown = false;

        //                 this.$el.nextElementSibling
        //                 .querySelectorAll("li")
        //                 .forEach((item) => {
        //                     console.log(this.filterBy);
        //                     if (
        //                     item.innerText
        //                         .toLowerCase()
        //                         .startsWith(this.filterBy.toLowerCase())
        //                     )
        //                     atLeastOneItemIsShown = true;
        //                 });
        //                 return atLeastOneItemIsShown;
        //             }
        //             }
        //         }));
        //         }
        //     }));
        //   });

      
       

       
       
    </script>
@endpush


