document.addEventListener('livewire:initialized', () => {
    const component = Livewire.find(document.getElementById('component-id').value);

    $('.date-range').each(function () {
        const config = {
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear',
                format: 'DD/MM/YYYY',
            },
            showDropdowns: true,
        };

        if (
            $(this).data('default-start')
            && $(this).data('default-end')
        ) {
            config['startDate'] = moment($(this).data('default-start')).format('DD/MM/YYYY');
            config['endDate'] = moment($(this).data('default-end')).format('DD/MM/YYYY');
        }

        $(this).daterangepicker(config);

        $(this).val(config['startDate'] && config['endDate'] ? `${config['startDate']} - ${config['endDate']}` : '');

        $(this).on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            component.filter(
                $(this).attr('data-searchColumn'),
                $(this).attr('data-filter'),
                [picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD')]
            )
        });

        $(this).on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('')
            picker.setStartDate({})
            picker.setEndDate({})
            component.filter(
                $(this).attr('data-searchColumn'),
                $(this).attr('data-filter'),
                ['', '']
            )
        });
    })

    $('.number-range').each(function () {
        const rangeFilter = $(this).find('.range');

        let column = rangeFilter.attr('data-searchColumn');

        let min = parseInt(rangeFilter.attr('data-min'));
        let max = parseInt(rangeFilter.attr('data-max'));

        let defaultStart = min;
        let defaultEnd = max;

        if (
            rangeFilter.data('default-start')
            && rangeFilter.data('default-end')
        ) {
            defaultStart = parseInt(rangeFilter.data('default-start'));
            defaultEnd = parseInt(rangeFilter.data('default-end'));
        }

        const rangeDisplay = $(this).find('.amount-display');
        rangeDisplay.text(defaultStart + " - " + defaultEnd);

        $(this).find('.range').slider({
            range: true,
            min: min,
            max: max,
            values: [defaultStart, defaultEnd],
            slide: function (event, ui) {
                rangeDisplay.text(ui.values[0] + " - " + ui.values[1]);
            },
            change: function (event, ui) {
                if (!event.originalEvent) {
                    return;
                }

                rangeDisplay.text(ui.values[0] + " - " + ui.values[1]);
                component.filter(
                    column,
                    'range',
                    [ui.values[0], ui.values[1]]
                )
            }
        });
    });

    Livewire.on('resetTableFilters', () => {
        $('.date-range').each(function () {
            $(this).val('');
        })

        $('.number-range').each(function () {
            const slider = $(this).find('.range');

            const min = parseInt(slider.attr('data-min'));
            const max = parseInt(slider.attr('data-max'));

            slider.slider('values', 0, min);
            slider.slider('values', 1, max);

            const rangeDisplay = $(this).find('.amount-display');
            rangeDisplay.text(min + " - " + max);
        });

        $('select:not(#per-page-select), input').val('').trigger('change');
    });

    $(document).on('click', '#exportBtn', () => {
        $('#exportBtn i').addClass('fa-spinner')
            .addClass('fa-spin-pulse')
            .removeClass('fa-download');
        component.exportCsv();
    });

    Livewire.hook('request', ({ respond }) => {
        respond(() => {
            $('#exportBtn i').removeClass('fa-spinner')
                .removeClass('fa-spin-pulse')
                .addClass('fa-download');
        })
    })
});
