$(document).ready(function () {

    // show fix header and scroll button
    $(window).scroll(function(){
        if(window.scrollY > 220){
            $('nav.bottom-nav').addClass('fixed-top');
            $('.scrolltop-btn').show();
        }else{
            $('nav.bottom-nav').removeClass('fixed-top');
            $('.scrolltop-btn').hide();
        }
    })
    // scroll button function
    $('.scrolltop-btn').click(function(){
        window.scrollTo(0,0);
    })

    // language dropdown
    $('.lang-dropdown').hover(function () {
        $(this).find('.lang-menu').removeClass('d-none');
    }, function () {
        $(this).find('.lang-menu').addClass('d-none');
    })


    // search
    $('.search-button').on('click', function () {
        $('.search-wrapper').removeClass('d-none')
    })
    $('.search-wrapper .close-button').on('click', function () {
        $('.search-wrapper').addClass('d-none')
    })

    // mobile menu
    $('.menu-button').on('click', function () {
        $('.nav-menu').addClass('active');
        $('.menu-backdrop').removeClass('d-none')
    });
    $('.menu-backdrop').on('click', function () {
        $('.nav-menu').removeClass('active');
        $('.menu-backdrop').addClass('d-none')
    });
    $('.nav-menu .close-button').on('click', function () {
        $('.nav-menu').removeClass('active');
        $('.menu-backdrop').addClass('d-none')
    })

    // link dropdown 
    $('.link-item.has-child .label button').on('click', function () {
        var dropdownMenu = $(this).parent().siblings('.link-menu');
        $('.link-menu').not(dropdownMenu).addClass("d-none");
        dropdownMenu.toggleClass("d-none");
    });
    $('.link-item.has-child').hover(function () {
        if (window.innerWidth > 1200) {
            $(this).find('.link-menu').removeClass("d-none");
        }
    }, function () {
        if (window.innerWidth > 1200) {
            $(this).find('.link-menu').addClass("d-none");
        }
    });

    // about bg
    $(window).scroll(function () {
        var scrolled = $(window).scrollTop();
        var backgroundPositionX = -scrolled / 2;
        $('.about-bg').css('background-position-x', backgroundPositionX)
    })

    // vacancy accordion
    $('.vacancy-accordion .acc-item:first-child .acc-button').addClass('active')
    $('.vacancy-accordion .acc-item:first-child .acc-collapse').addClass('show')
    $('.vacancy-accordion .acc-button').on('click', function () {
        var content = $(this).closest('.acc-item').find('.acc-collapse');
        content.slideToggle();
        $('.acc-collapse').not(content).slideUp();
        $(this).toggleClass('active');
        $('.acc-button').not(this).removeClass('active')
    })

    // vacancy file input
    $('.user-photo .file-input input').on('change', function () {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.user-photo .file-result img').addClass('active')
                $('.user-photo .file-result img').attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

    function isValidEmail(email) {
        var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return emailRegex.test(email);
    }

    // vacancy form validation
    $('form.vacancy-form .submit-button').on('click', function (event) {
        $('.vacancy-validate').each(function () {
            var inputValue = $(this).val().trim();
            var fieldName = $(this).attr('name');
            if (inputValue === '') {
                $(this).removeClass('valid');
                $(this).addClass('invalid');
                $(this).addClass('invalid');
                event.preventDefault();
                window.scrollTo(0, 0);
            } else {
                $(this).removeClass('invalid');
                $(this).addClass('valid');

                if (fieldName === 'email' && !isValidEmail(inputValue)) {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                    window.scrollTo(0, 0);
                    event.preventDefault();
                    return false;
                }
            }
        })
        $('.vacancy-validate').on('input', function () {
            var inputValue = $(this).val().trim();
            var fieldName = $(this).attr('name');
            if (inputValue === '') {
                $(this).removeClass('valid');
                $(this).addClass('invalid');
            } else {
                $(this).removeClass('invalid');
                $(this).addClass('valid');

                if (fieldName === 'email' && !isValidEmail(inputValue)) {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                }
            }
        })
    });



    // education data
    let educationArr = [];
    let educationID = 0;
    $('.detail-wrapper.education .add-button').on('click', function () {
        let levelValue = $('.detail-wrapper.education select[name="education_level"]').val();
        let nameValue = $('.detail-wrapper.education input[name="education_name"]').val();
        let fieldValue = $('.detail-wrapper.education input[name="education_field"]').val();
        let startDate = $('.detail-wrapper.education input[name="education_start_date"]').val();
        let endDate = $('.detail-wrapper.education input[name="education_end_date"]').val();
        if (levelValue && nameValue && fieldValue && startDate && endDate) {
            $('.detail-wrapper.education .v-detail-validate').removeClass('invalid');
            $('.detail-wrapper.education .v-detail-validate').removeClass('valid');
            // hidden inputun valuesinə əlavə etmə
            educationID += 1;
            let newEducation = {
                educationID,
                levelValue,
                nameValue,
                fieldValue,
                startDate,
                endDate,
            }
            educationArr.push(newEducation);
            $('.detail-wrapper.education input[name="education[]"]').val(JSON.stringify(educationArr));
            
            // table yaratma
            let educationTable = `
            <tr>
                <td>${newEducation.levelValue}</td>
                <td>${newEducation.nameValue}</td>
                <td>${newEducation.fieldValue}</td>
                <td>${newEducation.startDate} / ${newEducation.endDate}</td>
                <td>
                    <div class="delete-button">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                    <input type="hidden" class="education-id" value='${newEducation.educationID}' />
                </td>
            </tr>
            `;
            $('.detail-wrapper.education .detail-result .empty').addClass('d-none');
            $('.detail-wrapper.education .detail-result table').removeClass('d-none');
            $('.detail-wrapper.education .detail-result table').append(educationTable);
            // reset inputs
            $('.detail-wrapper.education select[name="education_level"]').val('school');
            $('.detail-wrapper.education input[name="education_name"]').val('');
            $('.detail-wrapper.education input[name="education_field"]').val('');
            $('.detail-wrapper.education input[name="education_start_date"]').val('');
            $('.detail-wrapper.education input[name="education_end_date"]').val('');

            // delete row
            $('.detail-wrapper.education .delete-button').on('click', function () {
                let removeID = $(this).closest('tr').find('.education-id').val();
                educationArr = educationArr.filter((row) => row.educationID !== parseInt(removeID));
                $('.detail-wrapper.education input[name="education[]"]').val(JSON.stringify(educationArr));
                $(this).closest('tr').remove();
                if ($('.detail-wrapper.education .detail-result table tr').length === 0) {
                    $('.detail-wrapper.education .detail-result table').addClass('d-none');
                    $('.detail-wrapper.education .detail-result .empty').removeClass('d-none');
                }
            })
        } else {
            $('.detail-wrapper.education .v-detail-validate').each(function () {
                if ($(this).val().trim() == '') {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                    $(this).addClass('valid');
                }
            })
            $('.detail-wrapper.education .v-detail-validate').on('input', function () {
                if ($(this).val().trim() == '') {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                    $(this).addClass('valid');
                }
            })
        }
    })

    // work data
    let workArr = [];
    let workID = 0;
    $('.detail-wrapper.work .add-button').on('click', function () {
        let nameValue = $('.detail-wrapper.work input[name="company_name"]').val();
        let positionValue = $('.detail-wrapper.work input[name="position"]').val();
        let startDate = $('.detail-wrapper.work input[name="work_start_date"]').val();
        let endDate = $('.detail-wrapper.work input[name="work_end_date"]').val();
        if (nameValue && positionValue && startDate && endDate) {
            $('.detail-wrapper.work .v-detail-validate').removeClass('invalid');
            $('.detail-wrapper.work .v-detail-validate').removeClass('valid');
            // hidden inputun valuesinə əlavə etmə
            workID += 1;
            let newWork = {
                workID,
                nameValue,
                positionValue,
                startDate,
                endDate,
            }
            workArr.push(newWork);
            $('.detail-wrapper.work input[name="work[]"]').val(JSON.stringify(workArr));
            console.log(workArr)
            // table yaratma
            let workTable = `
            <tr>
                <td>${newWork.nameValue}</td>
                <td>${newWork.positionValue}</td>
                <td>${newWork.startDate} / ${newWork.endDate}</td>
                <td>
                    <div class="delete-button">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                    <input type="hidden" class="work-id" value='${newWork.workID}' />
                </td>
            </tr>
            `;
            $('.detail-wrapper.work .detail-result .empty').addClass('d-none');
            $('.detail-wrapper.work .detail-result table').removeClass('d-none');
            $('.detail-wrapper.work .detail-result table').append(workTable);
            // reset inputs
            $('.detail-wrapper.work input[name="company_name"]').val('');
            $('.detail-wrapper.work input[name="position"]').val('');
            $('.detail-wrapper.work input[name="work_start_date"]').val('');
            $('.detail-wrapper.work input[name="work_end_date"]').val('');

            // delete row
            $('.detail-wrapper.work .delete-button').on('click', function () {
                let removeID = $(this).closest('tr').find('.work-id').val();
                workArr = workArr.filter((row) => row.workID !== parseInt(removeID));
                $('.detail-wrapper.work input[name="work[]"]').val(JSON.stringify(workArr));
                $(this).closest('tr').remove();
                if ($('.detail-wrapper.work .detail-result table tr').length === 0) {
                    $('.detail-wrapper.work .detail-result table').addClass('d-none');
                    $('.detail-wrapper.work .detail-result .empty').removeClass('d-none');
                }
            })
        } else {
            $('.detail-wrapper.work .v-detail-validate').each(function () {
                if ($(this).val().trim() == '') {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                    $(this).addClass('valid');
                }
            })
            $('.detail-wrapper.work .v-detail-validate').on('input', function () {
                if ($(this).val().trim() == '') {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                    $(this).addClass('valid');
                }
            })
        }
    })

    // certificate data
    let certificateArr = [];
    let certificateID = 0;
    $('.detail-wrapper.certificate .add-button').on('click', function () {
        let nameValue = $('.detail-wrapper.certificate input[name="certificate_name"]').val();
        let certificateDate = $('.detail-wrapper.certificate input[name="certificate_date"]').val();
        if (nameValue && certificateDate) {
            $('.detail-wrapper.certificate .v-detail-validate').removeClass('invalid');
            $('.detail-wrapper.certificate .v-detail-validate').removeClass('valid');
            // hidden inputun valuesinə əlavə etmə
            certificateID += 1;
            let newCertificate = {
                certificateID,
                nameValue,
                certificateDate
            }
            certificateArr.push(newCertificate);
            $('.detail-wrapper.certificate input[name="certificate[]"]').val(JSON.stringify(certificateArr));
            // table yaratma
            let certificateTable = `
            <tr>
                <td>${newCertificate.nameValue}</td>
                <td>${newCertificate.certificateDate}</td>
                <td>
                    <div class="delete-button">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                    <input type="hidden" class="certificate-id" value='${newCertificate.certificateID}' />
                </td>
            </tr>
            `;
            $('.detail-wrapper.certificate .detail-result .empty').addClass('d-none');
            $('.detail-wrapper.certificate .detail-result table').removeClass('d-none');
            $('.detail-wrapper.certificate .detail-result table').append(certificateTable);
            // reset inputs
            $('.detail-wrapper.certificate input[name="certificate_name"]').val('');
            $('.detail-wrapper.certificate input[name="certificate_date"]').val('');

            // delete row
            $('.detail-wrapper.certificate .delete-button').on('click', function () {
                let removeID = $(this).closest('tr').find('.certificate-id').val();
                certificateArr = certificateArr.filter((row) => row.certificateID !== parseInt(removeID));
                $('.detail-wrapper.certificate input[name="certificate[]"]').val(JSON.stringify(certificateArr));
                $(this).closest('tr').remove();
                if ($('.detail-wrapper.certificate .detail-result table tr').length === 0) {
                    $('.detail-wrapper.certificate .detail-result table').addClass('d-none');
                    $('.detail-wrapper.certificate .detail-result .empty').removeClass('d-none');
                }
            })
        } else {
            $('.detail-wrapper.certificate .v-detail-validate').each(function () {
                if ($(this).val().trim() == '') {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                    $(this).addClass('valid');
                }
            })
            $('.detail-wrapper.certificate .v-detail-validate').on('input', function () {
                if ($(this).val().trim() == '') {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                    $(this).addClass('valid');
                }
            })
        }
    })

    // language data
    let languageArr = [];
    let languageID = 0;
    $('.detail-wrapper.language .add-button').on('click', function () {
        let nameValue = $('.detail-wrapper.language select[name="language_name"]').val();
        let levelValue = $('.detail-wrapper.language select[name="language_level"]').val();
        if (nameValue && levelValue) {
            $('.detail-wrapper.language .v-detail-validate').removeClass('invalid');
            $('.detail-wrapper.language .v-detail-validate').removeClass('valid');
            // hidden inputun valuesinə əlavə etmə
            languageID += 1;
            let newlanguage = {
                languageID,
                nameValue,
                levelValue
            }
            languageArr.push(newlanguage);
            $('.detail-wrapper.language input[name="language[]"]').val(JSON.stringify(languageArr));
            // table yaratma
            let languageTable = `
        <tr>
            <td>${newlanguage.nameValue}</td>
            <td>${newlanguage.levelValue}</td>
            <td>
                <div class="delete-button">
                    <i class="fa-solid fa-trash"></i>
                </div>
                <input type="hidden" class="language-id" value='${newlanguage.languageID}' />
            </td>
        </tr>
        `;
            $('.detail-wrapper.language .detail-result .empty').addClass('d-none');
            $('.detail-wrapper.language .detail-result table').removeClass('d-none');
            $('.detail-wrapper.language .detail-result table').append(languageTable);
            // reset inputs
            $('.detail-wrapper.language input[name="language_name"]').val('');
            $('.detail-wrapper.language input[name="language_level"]').val('');

            // delete row
            $('.detail-wrapper.language .delete-button').on('click', function () {
                let removeID = $(this).closest('tr').find('.language-id').val();
                languageArr = languageArr.filter((row) => row.languageID !== parseInt(removeID));
                $('.detail-wrapper.language input[name="language[]"]').val(JSON.stringify(languageArr));
                $(this).closest('tr').remove();
                if ($('.detail-wrapper.language .detail-result table tr').length === 0) {
                    $('.detail-wrapper.language .detail-result table').addClass('d-none');
                    $('.detail-wrapper.language .detail-result .empty').removeClass('d-none');
                }
            })
        } else {
            $('.detail-wrapper.language .v-detail-validate').each(function () {
                if ($(this).val().trim() == '') {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                    $(this).addClass('valid');
                }
            })
            $('.detail-wrapper.language .v-detail-validate').on('input', function () {
                if ($(this).val().trim() == '') {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                    $(this).addClass('valid');
                }
            })
        }
    });



    // contact form
    $('form.contact-form .submit-button').on('click', function (event) {
        $('.contact-validate').each(function () {
            var inputValue = $(this).val().trim();
            var fieldName = $(this).attr('name');
            if (inputValue === '') {
                $(this).removeClass('valid');
                $(this).addClass('invalid');
                $(this).addClass('invalid');
                event.preventDefault();
            } else {
                $(this).removeClass('invalid');
                $(this).addClass('valid');

                if (fieldName === 'email' && !isValidEmail(inputValue)) {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                    event.preventDefault();
                    return false;
                }
            }
        })
        $('.contact-validate').on('input', function () {
            var inputValue = $(this).val().trim();
            var fieldName = $(this).attr('name');
            if (inputValue === '') {
                $(this).removeClass('valid');
                $(this).addClass('invalid');
            } else {
                $(this).removeClass('invalid');
                $(this).addClass('valid');

                if (fieldName === 'email' && !isValidEmail(inputValue)) {
                    $(this).removeClass('valid');
                    $(this).addClass('invalid');
                }
            }
        })
    });

    // service detail
    $('.content-triggers .trigger:first-child').addClass('active');
    $('.service-contents .contents .row.content-row:first-child').removeClass('d-none');

    $('.content-triggers .trigger').on('click', function(){
        let contentID = $(this).attr('data-id');
        $('.content-triggers .trigger').removeClass('active');
        $(this).addClass('active');

        $('.service-contents .contents .content-row').addClass('d-none');
        let activeContent = $('.service-contents .contents .content-row').filter('[data-id="' + contentID + '"]');
        activeContent.removeClass('d-none');
    })

})


if (document.querySelector('.alert-message')) {
    let alertMsg = document.querySelector('.alert-message');
    let closeAlertBtn = document.querySelector('.alert-message button');

    setTimeout(() => {
        alertMsg.classList.add('hide-alert');
    }, 3000);
    setTimeout(() => {
        alertMsg.remove();
    }, 4000);

    closeAlertBtn.addEventListener('click', () => {
        alertMsg.classList.add('hide-alert');
        setTimeout(() => {
            alertMsg.remove();
        }, 3000);
    })
}

