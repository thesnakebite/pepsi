<!-- CookieConsent config -->
<script>
    window.CookieConsent.init({
        modalMainTextMoreLink: "<?php echo __('cookies.cookie-consent.modalMainTextMoreLink'); ?>",
        barTimeout: 1000,
        theme: {
            barColor: '#CCCCCC',
            barTextColor: '#4D4D4D',
            barMainButtonColor: '#8C8C8C',
            barMainButtonTextColor: '#FFFFFF',
            modalMainButtonColor: '#8C8C8C',
            modalMainButtonTextColor: '#FFFFFF',
        },
        language: {
            current: "<?php echo app()->getLocale(); ?>",
            locale: {
                en: {
                    barMainText: "<?php echo __('cookies.cookie-consent.barMainText'); ?>",
                    barLinkSetting: "<?php echo __('cookies.cookie-consent.barLinkSetting'); ?>",
                    barBtnAcceptAll: "<?php echo __('cookies.cookie-consent.barBtnAcceptAll'); ?>",
                    modalMainTitle: "<?php echo __('cookies.cookie-consent.modalMainTitle'); ?>",
                    modalMainText: "<?php echo __('cookies.cookie-consent.modalMainText'); ?>",
                    modalBtnSave: "<?php echo __('cookies.cookie-consent.modalBtnSave'); ?>",
                    modalBtnAcceptAll: "<?php echo __('cookies.cookie-consent.modalBtnAcceptAll'); ?>",
                    modalAffectedSolutions: "<?php echo __('cookies.cookie-consent.modalAffectedSolutions'); ?>",
                    learnMore: "<?php echo __('cookies.cookie-consent.learnMore'); ?>",
                    on: "<?php echo __('cookies.cookie-consent.on'); ?>",
                    off: "<?php echo __('cookies.cookie-consent.off'); ?>",
                },
                es: {
                    barMainText: "<?php echo __('cookies.cookie-consent.barMainText'); ?>",
                    barLinkSetting: "<?php echo __('cookies.cookie-consent.barLinkSetting'); ?>",
                    barBtnAcceptAll: "<?php echo __('cookies.cookie-consent.barBtnAcceptAll'); ?>",
                    modalMainTitle: "<?php echo __('cookies.cookie-consent.modalMainTitle'); ?>",
                    modalMainText: "<?php echo __('cookies.cookie-consent.modalMainText'); ?>",
                    modalBtnSave: "<?php echo __('cookies.cookie-consent.modalBtnSave'); ?>",
                    modalBtnAcceptAll: "<?php echo __('cookies.cookie-consent.modalBtnAcceptAll'); ?>",
                    modalAffectedSolutions: "<?php echo __('cookies.cookie-consent.modalAffectedSolutions'); ?>",
                    learnMore: "<?php echo __('cookies.cookie-consent.learnMore'); ?>",
                    on: "<?php echo __('cookies.cookie-consent.on'); ?>",
                    off: "<?php echo __('cookies.cookie-consent.off'); ?>",
                }
            }
        },
        categories: {
            system: {
                needed: true,
                wanted: true,
                checked: true,
                language: {
                    locale: {
                        en: {
                            name: "<?php echo __('cookies.cookie-consent.systemCategoryTitle'); ?>",
                            description: "<?php echo __('cookies.cookie-consent.systemCategoryDescription'); ?>"
                        },
                        es: {
                            name: "<?php echo __('cookies.cookie-consent.systemCategoryTitle'); ?>",
                            description: "<?php echo __('cookies.cookie-consent.systemCategoryDescription'); ?>"
                        }
                    }
                }
            },
            usage: {
                needed: false,
                wanted: false,
                checked: false,
                language: {
                    locale: {
                        en: {
                            name: "<?php echo __('cookies.cookie-consent.usageCategoryTitle'); ?>",
                            description: "<?php echo __('cookies.cookie-consent.usageCategoryDescription'); ?>"
                        },
                        es: {
                            name: "<?php echo __('cookies.cookie-consent.usageCategoryTitle'); ?>",
                            description: "<?php echo __('cookies.cookie-consent.usageCategoryDescription'); ?>"
                        }
                    }
                }
            },
            content: {
                needed: false,
                wanted: false,
                checked: false,
                language: {
                    locale: {
                        en: {
                            name: "<?php echo __('cookies.cookie-consent.contentCategoryTitle'); ?>",
                            description: "<?php echo __('cookies.cookie-consent.contentCategoryDescription'); ?>"
                        },
                        es: {
                            name: "<?php echo __('cookies.cookie-consent.contentCategoryTitle'); ?>",
                            description: "<?php echo __('cookies.cookie-consent.contentCategoryDescription'); ?>"
                        }
                    }
                }
            }
        },
        services: {
            laravel: {
                category: 'system',
                type: 'localcookie',
                search: 'localcookie',
                cookies: [
                    {
                        name: 'XSRF-TOKEN',
                        domain: `.${window.location.hostname}`
                    },
                    {
                        name: 'laravel_session',
                        domain: `.${window.location.hostname}`
                    }
                ],
                language: {
                    locale: {
                        en: {
                            name: 'Laravel: laravel_session, XSFR-TOKEN'
                        },
                        es: {
                            name: 'Laravel: laravel_session, XSFR-TOKEN'
                        }
                    }
                }
            },
            analytics: {
                category: 'usage',
                type: 'dynamic-script',
                search: 'analytics',
                cookies: [
                    {
                        name: '_gid',
                        domain: `.${window.location.hostname}`
                    },
                    {
                        name: /^_ga/,
                        domain: `.${window.location.hostname}`
                    }
                ],
                language: {
                    locale: {
                        en: {
                            name: 'Google Analytics: _gid, _ga, _gat'
                        },
                        es: {
                            name: 'Google Analytics: _gid, _ga, _gat'
                        }
                    }
                }
            },
            vimeo: {
                category: 'content',
                type: 'dynamic-script',
                search: 'vimeo',
                cookies: [
                    { name: '_abexps', domain: '.vimeo.com' },
                    { name: 'vimeo', domain: '.vimeo.com' },
                    { name: '_gcl_au', domain: '.vimeo.com' },
                    { name: '__qca', domain: '.vimeo.com' },
                    { name: '_fbp', domain: '.vimeo.com' },
                    { name: 'has_uploaded', domain: '.vimeo.com' },
                    { name: 'continuous_play_v3', domain: '.vimeo.com' },
                    { name: 'player', domain: '.vimeo.com' },
                    { name: 'sd_client_id', domain: '.vimeo.com' },
                    { name: '_mkto_trk', domain: '.vimeo.com' },
                    { name: '__ssid', domain: '.vimeo.com' },
                    { name: '__gads', domain: '.vimeo.com' },
                    { name: 'is_logged_in', domain: '.vimeo.com' },
                    { name: 'has_logged_in', domain: '.vimeo.com' },
                    { name: 'rbuid', domain: '.vimeo.com' },
                    { name: '_delighted_web', domain: '.vimeo.com' },
                    { name: '_ga', domain: '.vimeo.com' },
                    { name: 'vuid', domain: '.vimeo.com' },
                    { name: '_abexps', domain: 'vimeo.com' },
                    { name: '_mibhv', domain: 'vimeo.com' }
                ],
                language: {
                    locale: {
                        en: {
                            name: 'Vimeo: _abexps, vimeo, _gcl_au, __qca, _fbp, has_uploaded, continous_play_v3, player, sd_client_id, _mkto_trk, __ssid, _mibhv, __gads, is_logged_in, has_logged_in, rbuid, _delighted_web, vuid'
                        },
                        es: {
                            name: 'Vimeo: _abexps, vimeo, _gcl_au, __qca, _fbp, has_uploaded, continous_play_v3, player, sd_client_id, _mkto_trk, __ssid, _mibhv, __gads, is_logged_in, has_logged_in, rbuid, _delighted_web, vuid'
                        }
                    }
                }
            }
        }
    });

    var ccModalUITimer = setInterval(function () {
        if (document.querySelector('#cconsent-modal') != null) {
            // accept all cookies buttons
            document.querySelectorAll('.consent-give').forEach((consentBtn) => {
                consentBtn.addEventListener('click', () => {
                window.location.reload();
                return false;
                })
            });
            // accept only selected cookies button
            document.querySelector('#ccm__footer__consent-modal-submit').addEventListener('click', () => {
                window.location.reload();
                return false;
            });
        }
    }, 100);

</script>
