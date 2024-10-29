const socialContent = document.getElementById("socialContent");

const addSvg = `<svg onclick="handleAddItem()" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" d="M11.75 14.25H6.75C6.41848 14.25 6.10054 14.1183 5.86612 13.8839C5.6317 13.6495 5.5 13.3315 5.5 13C5.5 12.6685 5.6317 12.3505 5.86612 12.1161C6.10054 11.8817 6.41848 11.75 6.75 11.75H11.75V14.25ZM19.25 11.75H14.25V14.25H19.25C19.5815 14.25 19.8995 14.1183 20.1339 13.8839C20.3683 13.6495 20.5 13.3315 20.5 13C20.5 12.6685 20.3683 12.3505 20.1339 12.1161C19.8995 11.8817 19.5815 11.75 19.25 11.75Z" fill="#4285F4"/>
<path opacity="0.3" d="M18.2375 0.5H7.7625C3.75153 0.5 0.5 3.75153 0.5 7.7625V18.2375C0.5 22.2485 3.75153 25.5 7.7625 25.5H18.2375C22.2485 25.5 25.5 22.2485 25.5 18.2375V7.7625C25.5 3.75153 22.2485 0.5 18.2375 0.5Z" fill="#4285F4"/>
<path d="M19.25 11.75H14.25V6.75C14.25 6.41848 14.1183 6.10054 13.8839 5.86612C13.6495 5.6317 13.3315 5.5 13 5.5C12.6685 5.5 12.3505 5.6317 12.1161 5.86612C11.8817 6.10054 11.75 6.41848 11.75 6.75V11.75H6.75C6.41848 11.75 6.10054 11.8817 5.86612 12.1161C5.6317 12.3505 5.5 12.6685 5.5 13C5.5 13.3315 5.6317 13.6495 5.86612 13.8839C6.10054 14.1183 6.41848 14.25 6.75 14.25H11.75V19.25C11.75 19.5815 11.8817 19.8995 12.1161 20.1339C12.3505 20.3683 12.6685 20.5 13 20.5C13.3315 20.5 13.6495 20.3683 13.8839 20.1339C14.1183 19.8995 14.25 19.5815 14.25 19.25V14.25H19.25C19.5815 14.25 19.8995 14.1183 20.1339 13.8839C20.3683 13.6495 20.5 13.3315 20.5 13C20.5 12.6685 20.3683 12.3505 20.1339 12.1161C19.8995 11.8817 19.5815 11.75 19.25 11.75Z" fill="#4285F4"/>
</svg>
`;

const removeSvg = `<svg onclick="handleRemoveItem(this)" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M20.7381 0.832031H9.33398C7.07964 0.832031 4.91764 1.72756 3.32358 3.32162C1.72952 4.91568 0.833984 7.07769 0.833984 9.33203V20.807C0.871151 23.0367 1.78307 25.1625 3.37311 26.7261C4.96316 28.2896 7.10398 29.1657 9.33398 29.1654H20.809C23.0265 29.1285 25.1417 28.2264 26.7033 26.6515C28.2649 25.0767 29.1491 22.9539 29.1673 20.7362V9.33203C29.1674 7.08991 28.2816 4.93857 26.7028 3.34653C25.124 1.75449 22.9802 0.850716 20.7381 0.832031ZM20.1007 21.2745C20.0309 21.7512 19.7863 22.1849 19.4145 22.4912C19.0427 22.7976 18.5702 22.9547 18.089 22.932H12.0682C11.5798 22.9657 11.0969 22.8136 10.7159 22.5062C10.335 22.1989 10.0843 21.7589 10.014 21.2745L9.43315 14.0495C9.43481 13.9379 9.4592 13.8278 9.50485 13.7259C9.55049 13.6239 9.61643 13.5324 9.69862 13.4569C9.78082 13.3813 9.87756 13.3233 9.98293 13.2863C10.0883 13.2494 10.2001 13.2343 10.3115 13.242H19.6898C19.8012 13.2343 19.913 13.2494 20.0184 13.2863C20.1237 13.3233 20.2205 13.3813 20.3027 13.4569C20.3849 13.5324 20.4508 13.6239 20.4965 13.7259C20.5421 13.8278 20.5665 13.9379 20.5682 14.0495L20.1007 21.2745ZM21.5173 11.6129H21.3615C17.1317 11.027 12.8413 11.027 8.61148 11.6129C8.47379 11.6373 8.33262 11.6343 8.19608 11.6041C8.05954 11.5739 7.93032 11.517 7.81581 11.4367C7.7013 11.3564 7.60377 11.2543 7.52881 11.1362C7.45385 11.0182 7.40294 10.8865 7.37898 10.7487C7.35476 10.6108 7.3584 10.4695 7.38968 10.333C7.42096 10.1966 7.47925 10.0678 7.56112 9.95423C7.64299 9.84067 7.74677 9.74466 7.86634 9.67187C7.98591 9.59907 8.11885 9.55095 8.25732 9.53036C9.47705 9.33468 10.7067 9.20699 11.9407 9.14786L12.1673 7.91536C12.1992 7.55036 12.3587 7.20828 12.6178 6.9492C12.8769 6.69012 13.219 6.53061 13.584 6.4987H16.4173C16.7823 6.53061 17.1244 6.69012 17.3835 6.9492C17.6426 7.20828 17.8021 7.55036 17.834 7.91536L18.0182 9.06286C19.194 9.1337 20.4265 9.24703 21.6873 9.4312C21.9662 9.47656 22.216 9.62971 22.383 9.85763C22.55 10.0856 22.6207 10.37 22.5798 10.6495C22.5592 10.9054 22.4454 11.1448 22.26 11.3224C22.0746 11.4999 21.8305 11.6033 21.574 11.6129H21.5173Z" fill="#F1416C"/>
</svg>
`;

const handleChange = (selectElement) => {
    const actionIcon = selectElement.parentElement.previousElementSibling;

    if (!actionIcon.classList.contains("fixed-delete-icon")) {
        actionIcon.innerHTML = addSvg;
        actionIcon.classList.add("delete-icon");
    }
};

let socialItemIndex = 1; // Start counter from 1

const handleAddItem = () => {
    // Handle the previous delete icon if it exists
    const deleteIcon = document.querySelector(".delete-icon");
    if (deleteIcon) {
        deleteIcon.innerHTML = removeSvg;
        deleteIcon.classList.remove("delete-icon");
        deleteIcon.classList.add("fixed-delete-icon");
    }

    // Create the social item container
    const item = document.createElement("div");
    item.classList.add("social-item");

    // Action icon (delete button)
    const actionIcon = document.createElement("div");
    actionIcon.classList.add("action-icon", "delete-icon");
    item.appendChild(actionIcon);

    // Platform selection dropdown
    const platform = document.createElement("div");
    platform.classList.add("platform");
    const platformSelect = document.createElement("select");
    platformSelect.classList.add("platformSelect");
    platformSelect.setAttribute("name", `social_media_pages[${socialItemIndex}][position]`);

    const defaultOption = document.createElement("option");
    defaultOption.value = "";
    defaultOption.text = translations.platformt;
    platformSelect.appendChild(defaultOption);

    const platforms = [
        { value: "instagram", text: translations.instagram },
        { value: "x", text: translations.X },
        { value: "facebook", text: translations.facebook },
        { value: "tikTok", text: translations.tiktok },
    ];

    platforms.forEach((platformData) => {
        const option = document.createElement("option");
        option.value = platformData.value;
        option.textContent = platformData.text;
        platformSelect.appendChild(option);
    });

    platformSelect.addEventListener("change", function () {
        handleChange(this); // Call handleChange function if needed
    });

    platform.appendChild(platformSelect);
    item.appendChild(platform);

    // Platform URL input field
    const platformUrl = document.createElement("div");
    platformUrl.classList.add("platformUrl");
    const platformUrlInput = document.createElement("input");
    platformUrlInput.setAttribute("placeholder", translations.enter_url);
    platformUrlInput.setAttribute("name", `social_media_pages[${socialItemIndex}][url]`);
    platformUrl.appendChild(platformUrlInput);
    item.appendChild(platformUrl);

    // Append the new item to socialContent container
    document.getElementById("socialContent").appendChild(item);
    socialItemIndex++;
};


const handleRemoveItem = (svgElement) => {
    const item = svgElement.closest(".social-item");
    if (item) {
        document.getElementById("socialContent").removeChild(item);
    }
};

// ///////////////////
// seller2
// seller2
const clickInput = () => {
    document.getElementById(`file`).click();
};

let uploadedFiles = [];

const uploadeImg = (event) => {
    const file = event.target.files[0];
    if (file) {
        uploadedFiles.push(file);

        const reader = new FileReader();
        reader.onloadend = () => {
            const uploadedImg = [reader.result];

            const imgInput = document.createElement("div");
            imgInput.classList.add("imgInput");

            uploadedImg.forEach((link, index) => {
                const img = document.createElement("img");
                img.src = link;
                img.classList.add("img");

                const deleteBtn = document.createElement("button");
                deleteBtn.innerHTML = `<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path opacity="0.3" d="M23.65 0H9.68333C4.33538 0 0 4.33538 0 9.68333V23.65C0 28.998 4.33538 33.3333 9.68333 33.3333H23.65C28.998 33.3333 33.3333 28.998 33.3333 23.65V9.68333C33.3333 4.33538 28.998 0 23.65 0Z" fill="#6D6D6D"/>
                                  <path d="M19.0185 16.6668L23.7352 11.9502C23.9096 11.8007 24.0513 11.6169 24.1514 11.4101C24.2514 11.2033 24.3076 10.9781 24.3165 10.7486C24.3254 10.519 24.2867 10.2902 24.2029 10.0763C24.1191 9.8624 23.992 9.66816 23.8296 9.50573C23.6672 9.34331 23.4729 9.21621 23.259 9.13242C23.0452 9.04863 22.8163 9.00995 22.5868 9.01882C22.3572 9.02769 22.132 9.0839 21.9252 9.18394C21.7185 9.28398 21.5346 9.42568 21.3852 9.60015L16.6685 14.3168L11.9518 9.60015C11.633 9.32711 11.2229 9.18443 10.8034 9.20063C10.384 9.21683 9.98606 9.39072 9.68924 9.68755C9.39241 9.98437 9.21852 10.3823 9.20232 10.8017C9.18612 11.2212 9.3288 11.6313 9.60184 11.9502L14.3185 16.6668L9.60184 21.3835C9.29142 21.6958 9.11719 22.1182 9.11719 22.5585C9.11719 22.9988 9.29142 23.4212 9.60184 23.7335C9.91411 24.0439 10.3365 24.2181 10.7768 24.2181C11.2172 24.2181 11.6396 24.0439 11.9518 23.7335L16.6685 19.0168L21.3852 23.7335C21.6974 24.0439 22.1199 24.2181 22.5602 24.2181C23.0005 24.2181 23.4229 24.0439 23.7352 23.7335C24.0456 23.4212 24.2198 22.9988 24.2198 22.5585C24.2198 22.1182 24.0456 21.6958 23.7352 21.3835L19.0185 16.6668Z" fill="#6D6D6D"/>
                                </svg>`;
                deleteBtn.classList.add("delete-btn");
                deleteBtn.onclick = () => {
                    deleteFile(index, imgInput);
                };

                imgInput.appendChild(img);
                imgInput.appendChild(deleteBtn);
            });

            document.getElementById("productImagesInputs").prepend(imgInput);
        };

        reader.readAsDataURL(file);
        updateInputFiles(event);
    }
};

const deleteFile = (index, imgInput) => {
    uploadedFiles.splice(index, 1);
    imgInput.remove();
    const inputEvent = new Event("input", { bubbles: true });
    const fileInput = document.querySelector('input[type="file"]');
    updateInputFiles(inputEvent, fileInput);
};

const updateInputFiles = (event, fileInput = document.getElementById("file")) => {
    const dataTransfer = new DataTransfer();
    uploadedFiles.forEach((file) => dataTransfer.items.add(file));

    fileInput.files = dataTransfer.files; // Set the files to the input
};


// ///////////////////
// seller3
const branchesNumberInput = document.getElementById("branchesNumberInput")
const minusOne = ()=>{
    if(branchesNumberInput.value <= 1){
        return
    }
    branchesNumberInput.value = parseInt(branchesNumberInput.value) - 1;
    handelBranchesNumberInput()
}
const plusOne = ()=>{
    branchesNumberInput.value = parseInt(branchesNumberInput.value) + 1;
    handelBranchesNumberInput()
}

const handelBranchesNumberInput = ()=>{
    if(branchesNumberInput.value <= 0){
        branchesNumberInput.value = 1;
    }

    const branchesLocations = document.getElementById("branchesLocations")
    branchesLocations.innerHTML = "";

    for (let index = 0; index < branchesNumberInput.value; index++) {
        const locationItem = document.createElement("div")
        locationItem.classList.add("locationItem")
        locationItem.innerHTML = `<input type="text" name="branches[${index}][name]" placeholder= ${translations.enter_branch_address}>`
        branchesLocations.appendChild(locationItem);
    }
}

const showTextarea = (event) => {
    const textarea = document.getElementById("platformsTextArea");
    const isPlatformNo = document.getElementById("isPlatformNo");

    if (event.target.checked) {
        isPlatformNo.checked = false;
        textarea.style.display = "flex";
    } else {
        isPlatformNo.checked = true;
        textarea.style.display = "none";
    }
};

const hideTextarea = (event) => {
    const textarea = document.getElementById("platformsTextArea");
    const isPlatformYes = document.getElementById("isPlatformYes");

    if (event.target.checked) {
        isPlatformYes.checked = false;
        textarea.style.display = "none";
    } else {
        isPlatformYes.checked = true;
        textarea.style.display = "flex";
    }
};


const showBranches = (event) => {
    const branchesInputs = document.getElementById("branchesInputs");
    const online = document.getElementById("online");
    const branch = document.getElementById("branch");
    const both = document.getElementById("both");

    if (event.target.checked) {
        online.checked = false;
        if(event.target.id == "both"){
            branch.checked = false;
        }else{
            both.checked = false;
        }
        branchesInputs.style.display = "flex";
    } else {
        online.checked = true;
        branch.checked = false;
        both.checked = false;
        branchesInputs.style.display = "none";
    }
};

const hideBranches = (event) => {
    const branchesInputs = document.getElementById("branchesInputs");
    const branch = document.getElementById("branch");
    const both = document.getElementById("both");

    if (event.target.checked) {
        branch.checked = false;
        both.checked = false;
        branchesInputs.style.display = "none";
    } else {
        branch.checked = true;
        branchesInputs.style.display = "flex";
    }
};