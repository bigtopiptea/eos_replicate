<template>
    <div class="w-full border bg-white h-screen border-white overflow-auto">
        <form
            @submit.prevent="!editMode ? save() : update()"
            enctype="multipart/form-data"
        >
            <div class="flex items-center space-x-2 m-5">
                <div class="w-1/2">
                    <SmallHeading class="pl-6" label="Email Type" />
                    <v-select
                        placeholder="Forgot Password"
                        class="w-full uppercase border border-gray-300 shadow-sm"
                        :options="[
                            'Forgot Password',
                            'Partner Code',
                            'Password Renewal',
                        ]"
                        v-model="form.type"
                    ></v-select>
                </div>

                <div class="w-1/2">
                    <SmallHeading class="pl-6" label="Recipient" />
                    <SettingsInput
                        placeholder="Remitter Details"
                        class="w-full uppercase"
                        v-model="form.recipient"
                    />
                </div>
            </div>

            <div class="flex items-center space-x-2 m-5">
                <div class="w-full">
                    <SmallHeading class="pl-6" label="Subject" />
                    <SettingsInput
                        placeholder="Test Subject"
                        class="w-full uppercase"
                        v-model="form.subject"
                    />
                </div>
            </div>

            <div class="flex items-center space-x-2 m-5">
                <!-- <div class="w-full">
                <SmallHeading class="pl-6" label="Content" />
                <div v-if="editor" class="mt-5" id="contentBtn">
                    <button
                        @click="editor.chain().focus().toggleBold().run()"
                        :disabled="
                            !editor.can().chain().focus().toggleBold().run()
                        "
                        :class="{ 'is-active': editor.isActive('bold') }"
                    >
                        <svg
                            version="1.0"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24.000000pt"
                            height="24.000000pt"
                            viewBox="0 0 64.000000 64.000000"
                            preserveAspectRatio="xMidYMid meet"
                            class="-mt-2 -pb-5"
                        >
                            <g
                                transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)"
                                fill="#000000"
                                stroke="none"
                            >
                                <path
                                    d="M170 320 l0 -230 105 0 c156 0 204 27 213 120 4 46 2 52 -32 86 l-36 36 24 23 c52 48 45 133 -13 172 -30 21 -46 23 -147 23 l-114 0 0 -230z m210 131 c14 -28 13 -38 -10 -61 -13 -13 -33 -20 -60 -20 l-40 0 0 50 0 50 50 0 c38 0 52 -4 60 -19z m-4 -179 c22 -14 26 -52 10 -77 -14 -21 -24 -25 -66 -25 l-50 0 0 55 0 55 48 0 c26 0 52 -4 58 -8z"
                                />
                            </g>
                        </svg>
                    </button>
                    <button
                        @click="editor.chain().focus().toggleItalic().run()"
                        :disabled="
                            !editor.can().chain().focus().toggleItalic().run()
                        "
                        :class="{ 'is-active': editor.isActive('italic') }"
                    >
                        italic
                    </button>
                    <button
                        @click="editor.chain().focus().toggleStrike().run()"
                        :disabled="
                            !editor.can().chain().focus().toggleStrike().run()
                        "
                        :class="{ 'is-active': editor.isActive('strike') }"
                    >
                        strike
                    </button>
                    <button
                        @click="editor.chain().focus().toggleCode().run()"
                        :disabled="
                            !editor.can().chain().focus().toggleCode().run()
                        "
                        :class="{ 'is-active': editor.isActive('code') }"
                    >
                        code
                    </button>
                    <button
                        @click="editor.chain().focus().unsetAllMarks().run()"
                    >
                        clear marks
                    </button>
                    <button @click="editor.chain().focus().clearNodes().run()">
                        clear nodes
                    </button>
                    <button
                        @click="editor.chain().focus().setParagraph().run()"
                        :class="{ 'is-active': editor.isActive('paragraph') }"
                    >
                        paragraph {{ editor.isActive("paragraph") }}
                    </button>
                    <button
                        @click="
                            editor
                                .chain()
                                .focus()
                                .toggleHeading({ level: 1 })
                                .run()
                        "
                        :class="{
                            'is-active': editor.isActive('heading', {
                                level: 1,
                            }),
                        }"
                    >
                        h1
                    </button>
                    <button
                        @click="
                            editor
                                .chain()
                                .focus()
                                .toggleHeading({ level: 2 })
                                .run()
                        "
                        :class="{
                            'is-active': editor.isActive('heading', {
                                level: 2,
                            }),
                        }"
                    >
                        h2
                    </button>
                    <button
                        @click="
                            editor
                                .chain()
                                .focus()
                                .toggleHeading({ level: 3 })
                                .run()
                        "
                        :class="{
                            'is-active': editor.isActive('heading', {
                                level: 3,
                            }),
                        }"
                    >
                        h3
                    </button>
                    <button
                        @click="
                            editor
                                .chain()
                                .focus()
                                .toggleHeading({ level: 4 })
                                .run()
                        "
                        :class="{
                            'is-active': editor.isActive('heading', {
                                level: 4,
                            }),
                        }"
                    >
                        h4
                    </button>
                    <button
                        @click="
                            editor
                                .chain()
                                .focus()
                                .toggleHeading({ level: 5 })
                                .run()
                        "
                        :class="{
                            'is-active': editor.isActive('heading', {
                                level: 5,
                            }),
                        }"
                    >
                        h5
                    </button>
                    <button
                        @click="
                            editor
                                .chain()
                                .focus()
                                .toggleHeading({ level: 6 })
                                .run()
                        "
                        :class="{
                            'is-active': editor.isActive('heading', {
                                level: 6,
                            }),
                        }"
                    >
                        h6
                    </button>
                    <button
                        @click="editor.chain().focus().toggleBulletList().run()"
                        :class="{ 'is-active': editor.isActive('bulletList') }"
                    >
                        bullet list
                    </button>

                    <button
                        @click="
                            editor.chain().focus().toggleOrderedList().run()
                        "
                        :class="{ 'is-active': editor.isActive('orderedList') }"
                    >
                        ordered list
                    </button>
                    <button
                        @click="editor.chain().focus().toggleCodeBlock().run()"
                        :class="{ 'is-active': editor.isActive('codeBlock') }"
                    >
                        code block
                    </button>
                    <button
                        @click="editor.chain().focus().toggleBlockquote().run()"
                        :class="{ 'is-active': editor.isActive('blockquote') }"
                    >
                        blockquote
                    </button>
                    <button
                        @click="
                            editor.chain().focus().setHorizontalRule().run()
                        "
                    >
                        horizontal rule
                    </button>
                    <button
                        @click="editor.chain().focus().setHardBreak().run()"
                    >
                        hard break
                    </button>
                    <button
                        @click="editor.chain().focus().undo().run()"
                        :disabled="!editor.can().chain().focus().undo().run()"
                    >
                        undo
                    </button>
                    <button
                        @click="editor.chain().focus().redo().run()"
                        :disabled="!editor.can().chain().focus().redo().run()"
                    >
                        redo
                    </button>

                    <button @click="addImage">setImage</button>
                    <button
                        @click="setLink"
                        :class="{ 'is-active': editor.isActive('link') }"
                    >
                        setLink
                    </button>
                    <button
                        @click="editor.chain().focus().unsetLink().run()"
                        :disabled="!editor.isActive('link')"
                    >
                        unsetLink
                    </button>

                    <button
                        @click="
                            editor.chain().focus().setTextAlign('left').run()
                        "
                        :class="{
                            'is-active': editor.isActive({ textAlign: 'left' }),
                        }"
                    >
                        left
                    </button>
                    <button
                        @click="
                            editor.chain().focus().setTextAlign('center').run()
                        "
                        :class="{
                            'is-active': editor.isActive({
                                textAlign: 'center',
                            }),
                        }"
                    >
                        center
                    </button>
                    <button
                        @click="
                            editor.chain().focus().setTextAlign('right').run()
                        "
                        :class="{
                            'is-active': editor.isActive({
                                textAlign: 'right',
                            }),
                        }"
                    >
                        right
                    </button>
                    <button
                        @click="
                            editor.chain().focus().setTextAlign('justify').run()
                        "
                        :class="{
                            'is-active': editor.isActive({
                                textAlign: 'justify',
                            }),
                        }"
                    >
                        justify
                    </button>
                    <button
                        @click="editor.chain().focus().unsetTextAlign().run()"
                    >
                        unsetTextAlign
                    </button>

                    <button
                        @click="editor.chain().focus().toggleUnderline().run()"
                        :class="{ 'is-active': editor.isActive('underline') }"
                    >
                        toggleUnderline
                    </button>
                    <button
                        @click="editor.chain().focus().setUnderline().run()"
                        :disabled="editor.isActive('underline')"
                    >
                        setUnderline
                    </button>
                    <button
                        @click="editor.chain().focus().unsetUnderline().run()"
                        :disabled="!editor.isActive('underline')"
                    >
                        unsetUnderline
                    </button>

                    <button id="add" @click="addVideo">
                        Add YouTube video
                    </button>
                    <input
                        id="width"
                        type="number"
                        v-model="width"
                        placeholder="width"
                        min="320"
                        max="1024"
                    />
                    <input
                        id="height"
                        type="number"
                        v-model="height"
                        placeholder="height"
                        min="180"
                        max="720"
                    />
                </div>

                <editor-content
                    v-model="content"
                    :editor="editor"
                    class="mt-5 border-solid border border-[#3e3e3e]"
                    id="editor"
                />

                <div class="character-count" v-if="editor">
                    {{ editor.storage.characterCount.characters() }}/
                    {{ limit }}
                    characters
                    <br />
                    {{ editor.storage.characterCount.words() }} words
                </div>
            </div> -->

                <div class="w-full">
                    <SmallHeading class="pl-6" label="Content" />
                    <ckeditor
                        :editor="ckeditor"
                        v-model="editorData"
                        :config="editorConfig"
                    ></ckeditor>
                </div>
            </div>
            <div class="text-right m-5 flex justify-between">
                <a
                    @click="back()"
                    class="hover:cursor-pointer border-[3px] transition ease-in-out delay-150 hover:translate-y-1 duration-300 border-[#3E3E3E] bg-[#3E3E3E] py-2 px-20 text-sm font-medium text-white uppercase tracking-widest shadow-sm hover:bg-[#2e2d2d] hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Close</a
                >
                <NormalBtn
                    :label="!editMode ? 'save' : 'update'"
                    class="h-[39px] text-[#F9951E] font-medium hover:bg-[#f78c0c] hover:text-white px-20 uppercase tracking-wider border-[3px] border-[#F9951E] transition ease-in-out delay-150 hover:translate-y-1"
                />
            </div>
        </form>
    </div>
</template>
<!-- 
<script>
import SettingsInput from "../../Misc/Input/SettingsInput.vue";
import SmallHeading from "../../Misc/Heading/SmallHeading.vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
// import Image from "@ckeditor/ckeditor5-image";

export default {
    name: "app",
    components: {
        SmallHeading,
        SettingsInput,
    },
    data() {
        return {
            editor: ClassicEditor,
            editorData: "<p>Content of the editor.</p>",
            editorConfig: {
                // The configuration of the editor.
                // plugins: [Image],
                // toolbar: ["imageUpload"],
            },
        };
    },
};
</script> -->

<script>
import { Editor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";
import Title from "../../../Misc/Section/Title.vue";
import SettingsInput from "../../../Misc/Input/SettingsInput.vue";
import SmallHeading from "../../../Misc/Heading/SmallHeading.vue";
import CharacterCount from "@tiptap/extension-character-count";
import Document from "@tiptap/extension-document";
import Paragraph from "@tiptap/extension-paragraph";
import Text from "@tiptap/extension-text";
import BulletList from "@tiptap/extension-bullet-list";
import ListItem from "@tiptap/extension-list-item";
import Heading from "@tiptap/extension-heading";
import Dropcursor from "@tiptap/extension-dropcursor";
import Image from "@tiptap/extension-image";
import Code from "@tiptap/extension-code";
import Link from "@tiptap/extension-link";
import TextAlign from "@tiptap/extension-text-align";
import Underline from "@tiptap/extension-underline";
import Youtube from "@tiptap/extension-youtube";

import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import NormalBtn from "../../../Misc/Buttons/NormalButton.vue";
import Form from "vform";

import { successMessage, errorMessage } from "@/utils/toast.js";

export default {
    components: {
        EditorContent,
        Title,
        SettingsInput,
        SmallHeading,
        Text,
        Paragraph,
        BulletList,
        Heading,
        Image,
        NormalBtn,
    },

    data() {
        return {
            editor: null,
            content: null,
            limit: 280,
            width: "640",
            height: "480",
            ckeditor: ClassicEditor,
            editorData: "<p>Content of the editor.</p>",
            editorConfig: {
                // The configuration of the editor.
                // plugins: [Image],
                // toolbar: ["imageUpload"],
            },
            form: new Form({
                id: "",
                type: {},
                recipient: "",
                subject: "",
                content: "",
                user_id: "",
            }),
            editMode: false,
        };
    },

    methods: {
        back() {
            this.$router.push("/app/settings/email-contents");
        },
        save() {
            this.form.content = this.editorData;
            console.log(this.editorData, this.form);
            this.form
                .post("/api/maintenance/custom-emails")
                .then((response) => {
                    successMessage(
                        "Success!",
                        response.data.message,
                        "top-right"
                    );
                    this.back();
                })
                .catch((error) => {});
        },
        async edit() {
            await axios
                .get("/api/maintenance/custom-emails/" + this.$route.params.id)
                .then((response) => {
                    this.form.fill(response.data.data);
                    this.editorData = this.form.content;
                    console.log(this.form);
                    // this.pagination = response.data.data;
                })
                .catch((error) => {
                    errorMessage(
                        "Oops!",
                        "Something went wrong in fetching the datas.",
                        "top-right"
                    );
                });
        },
        async checkMode() {
            if (this.$route.name == "edit-email-contents") {
                this.editMode = true;
                await this.edit();
            }
        },
        async update() {
            this.form.content = this.editorData;
            await this.form
                .put("/api/maintenance/custom-emails/" + this.form.id)
                .then((response) => {
                    successMessage(
                        "Success!",
                        response.data.message,
                        "top-right"
                    );
                    this.back();
                })
                .catch((error) => {});
        },
        addImage() {
            const url = window.prompt("URL");

            if (url) {
                this.editor.chain().focus().setImage({ src: url }).run();
            }
        },
        setLink() {
            const previousUrl = this.editor.getAttributes("link").href;
            const url = window.prompt("URL", previousUrl);

            // cancelled
            if (url === null) {
                return;
            }

            // empty
            if (url === "") {
                this.editor
                    .chain()
                    .focus()
                    .extendMarkRange("link")
                    .unsetLink()
                    .run();

                return;
            }

            // update link
            this.editor
                .chain()
                .focus()
                .extendMarkRange("link")
                .setLink({ href: url })
                .run();
        },
        addVideo() {
            const url = prompt("Enter YouTube URL");

            this.editor.commands.setYoutubeVideo({
                src: url,
                width: Math.max(320, parseInt(this.width, 10)) || 640,
                height: Math.max(180, parseInt(this.height, 10)) || 480,
            });
        },
    },

    mounted() {
        this.editor = new Editor({
            extensions: [
                Document,
                Paragraph,
                Text,
                BulletList,
                ListItem,
                Heading.configure({
                    levels: [1, 2, 3, 4, 5, 6],
                }),
                CharacterCount.configure({
                    limit: this.limit,
                    mode: "nodeSize",
                }),
                Image.configure({
                    allowBase64: true,
                }),
                Code,
                Link,
                Dropcursor,
                TextAlign.configure({
                    types: ["heading", "paragraph"],
                }),
                Underline,
                Youtube.configure({
                    controls: false,
                    autoplay: true,
                    loop: "true",
                    playlist: "E16u4txIxSA",
                }),
                StarterKit,
            ],

            content: `
       <p>Tiptap now supports YouTube embeds! Awesome!</p>
        <div data-youtube-video>
          <iframe src="https://www.youtube.com/watch?v=E16u4txIxSA"></iframe>
        </div>
        <p>Try adding your own video to this editor!</p>
      <p>There is no underline here.</p>
        <p><u>This is underlined though.</u></p>
        <p style="text-decoration: underline">And this as well.</p>
      <p style="text-align: center">first paragraph</p>
        <p style="text-align: right">second paragraph</p>
        <h2>
          Hi there,
        </h2>
        <p>
          this is a <em>basic</em> example of <strong>tiptap</strong>. Sure, there are all kind of basic text styles you’d probably expect from a text editor. But wait until you see the lists:
        </p>
        <ul>
          <li>
            That’s a bullet list with one …
          </li>
          <li>
            … or two list items.
          </li>
        </ul>
        <p>
          Isn’t that great? And all of that is editable. But wait, there’s more. Let’s try a code block:
        </p>
        <pre><code class="language-css">body {
  display: none;
}</code></pre>
        <p>
          I know, I know, this is impressive. It’s only the tip of the iceberg though. Give it a try and click a little bit around. Don’t forget to check the other examples too.
        </p>
        <blockquote>
          Wow, that’s amazing. Good work, boy! 👏
          <br />
          — Mom
        </blockquote>

         <p>This is a basic example of implementing images. Drag to re-order.</p>
        <img src="https://source.unsplash.com/8xznAGy4HcY/800x400" />
        <img src="https://source.unsplash.com/K9QHL52rE2k/800x400" />
      `,
            editorProps: {
                attributes: {
                    spellcheck: "false",
                },
            },
        });
    },

    beforeUnmount() {
        this.editor.destroy();
    },

    created() {
        this.checkMode();
    },
};
</script>

<style lang="scss">
#editor {
    font-size: 1.5rem;
    border-radius: 0.5rem;
    padding: 0.75rem;
}
#contentBtn > * {
    font-size: 1.5rem;
    border-style: solid;
    border-width: 1px;
    border-color: #3e3e3e;
    border-radius: 4px;
    margin: 5px;
    padding: 1px;
}

.is-active {
    background-color: black;
    color: white;
}

/* Basic editor styles */
.ProseMirror {
    > * + * {
        margin-top: 0.75em;
    }

    ul,
    ol {
        padding: 0 1rem;
        list-style: revert;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        line-height: 1.1;
    }

    code {
        background-color: rgba(#616161, 0.1);
        color: #616161;
    }

    pre {
        background: #0d0d0d;
        color: #fff;
        font-family: "JetBrainsMono", monospace;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;

        code {
            color: inherit;
            padding: 0;
            background: none;
            font-size: 0.8rem;
        }
    }

    img {
        max-width: 100%;
        height: auto;
        &.ProseMirror-selectednode {
            outline: 3px solid #68cef8;
        }
    }

    blockquote {
        padding-left: 1rem;
        border-left: 2px solid rgba(#0d0d0d, 0.1);
    }

    hr {
        border: none;
        border-top: 2px solid rgba(#0d0d0d, 0.1);
        margin: 2rem 0;
    }
    .character-count {
        margin-top: 1rem;
        color: #868e96;
    }
}
</style>
