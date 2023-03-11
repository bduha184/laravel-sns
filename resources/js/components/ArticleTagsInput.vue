<template>
    <div>
        <input type="hidden" name="tags" :value="tagsJson" />
        <vue3-tags-input
            :tags="tags"
            placeholder="タグを５個まで入力できます"
            :autocomplete-items="filteredItems"
            @on-tags-changed="(newTags) => (tags = newTags)"
        />
    </div>
</template>

<script>
import { defineComponent } from "vue";
import Vue3TagsInput from "vue3-tags-input";

export default defineComponent({
    components: {
        Vue3TagsInput,
    },
    props: {
        initialTags: {
            type: Array,
            default: [],
        },
        autocompleteItems: {
            type: Array,
            default: [],
        },
    },
    data() {
        return {
            tag: "",
            tags: this.initialTags,
        };
    },
    computed: {
        // filteredItems() {
        //     return this.autocompleteItems.filter((i) => {
        //         return (
        //             i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1
        //         );
        //     });
        // },
        tagsJson() {
            return JSON.stringify(this.tags);
        },
    },
});
</script>
<style lang="css" scoped></style>
<style lang="css">
.v3ti-tag span::before {
    content: "#";
  }
  </style>
