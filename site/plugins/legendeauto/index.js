panel.plugin('quentincrzt/legendeauto', {
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