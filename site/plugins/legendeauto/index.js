panel.plugin('quentin-f451/legendeauto', {
	'fields': {
		'legendeauto': {
			props: {
				caption: String
			},
			template: `
				<k-text-field v-model="caption" name="text" label="Légende" disabled="true" />
			`
		}
	}
});