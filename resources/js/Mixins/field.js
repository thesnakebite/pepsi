export default {
    watch: {
        form: {
            handler: function (newVal) {
                this.conditions.forEach(element => {
                    if (element[0] in newVal) {
                        if (newVal[element[0]] !== '') {
                            this.disabled = false
                        }
                    }
                });

                this.filters.forEach(element => {
                    if (element[0] in newVal) {
                        this.query[element[0] + 's'] = [newVal[element[0]]]
                        this.remoteMethod()
                    }
                });
            },
            deep: true
        }
    },
}